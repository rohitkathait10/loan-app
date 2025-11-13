<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\ReferralReward;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentController extends Controller
{
    private $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    }

    public function createOrder(Request $request)
    {
        try {

            $customer = Customer::where('id', $request->customer_id)->first();

            if ($customer->loan_type == 'business') {
                $amount = 699;
            } else {
                $amount = 499;
            }

            $order = $this->razorpay->order->create([
                'receipt'         => 'rcpt_' . uniqid(),
                'amount'          => $amount * 100,
                'currency'        => 'INR',
                'payment_capture' => 1,
            ]);

            Order::create([
                'razorpay_order_id' => $order['id'],
                'customer_id'       => $request->customer_id ?? null,
                'amount'            => $amount,
                'currency'          => 'INR',
                'status'            => 'created',
            ]);

            return response()->json([
                'success'  => true,
                'order_id' => $order['id'],
                'amount'   => $amount,
                'currency' => 'INR',
                'key'      => env('RAZORPAY_KEY'),
            ]);
        } catch (Exception $e) {
            Log::error('Razorpay Order Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Order creation failed']);
        }
    }

    public function verifyPayment(Request $request)
    {
        $request->validate([
            'razorpay_order_id'   => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature'  => 'required|string',
            'customer_id'         => 'required|integer|exists:customers,id',
        ]);

        try {
            $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->first();

            if (!$order) {
                return response()->json(['success' => false, 'message' => 'Order not found']);
            }

            $generated_signature = hash_hmac(
                'sha256',
                $request->razorpay_order_id . '|' . $request->razorpay_payment_id,
                env('RAZORPAY_SECRET')
            );

            if ($generated_signature !== $request->razorpay_signature) {
                $order->update(['status' => 'failed']);
                return response()->json(['success' => false, 'message' => 'Invalid signature']);
            }

            $payment = $this->razorpay->payment->fetch($request->razorpay_payment_id);

            if ($payment->status !== 'captured') {
                $order->update(['status' => 'failed']);
                return response()->json(['success' => false, 'message' => 'Payment not captured']);
            }

            $order->update([
                'status'              => 'paid',
                'payment_id' => $request->razorpay_payment_id,
                'signature'  => $request->razorpay_signature,
            ]);

            $customer = Customer::findOrFail($request->customer_id);
            $customer->status = 1;
            $customer->save();

            $now = now();
            $membershipEnd = $now->copy()->addMonths(6);

            $membershipTier = 'silver';
            $membershipTierCode = 1;
            $membershipCardNumber = $this->generateCardNumber($customer->id, $membershipTierCode, '01');

            $user = User::create([
                'name'              => $customer->name,
                'phone'             => $customer->phone,
                'loan_type'         => $customer->loan_type,
                'email'             => $customer->email ?? 'user_' . uniqid() . '@demo.com',
                'password'          => bcrypt('12345123'),
                'salary_type'       => $customer->salary_type,
                'loan_amount'       => $customer->loan_amount,
                'cibil_score'       => $customer->cibil_score,
                'monthly_income'    => $customer->monthly_income,
                'monthly_emi'       => $customer->monthly_emi,
                'loan_purpose'      => $customer->loan_purpose,
                'loan_eligibility'  => $customer->loan_eligibility,
                'emi_36'            => $customer->emi_36,
                'emi_48'            => $customer->emi_48,
                'emi_60'            => $customer->emi_60,
                'selected_emi'      => $customer->selected_emi,
                'city_id'           => $customer->city_id,
                'state_id'          => $customer->state_id,
                'ip_address'        => $customer->ip_address,
                'os'                => $customer->os,
                'browser'           => $customer->browser,
                'device_type'       => $customer->device_type,
                'referred_by'       => $customer->referred_by,
                'membership_status' => 1,
                'membership_start'  => $now,
                'membership_end'    => $membershipEnd,
                'membership_tier'   => $membershipTier,
                'membership_card_number' => $membershipCardNumber,
                'card_price' =>  $order->amount,
            ]);

            $order->update([
                'user_id' => $user->id,
            ]);

            if ($customer->referred_by) {
                $referrer = User::where('referral_code', $customer->referred_by)->first();
                if ($referrer) {
                    $referrer->increment('wallet_balance', 50);
                    ReferralReward::create([
                        'referrer_id'      => $referrer->id,
                        'referred_user_id' => $user->id,
                        'amount'           => 50,
                        'note'             => 'Referral reward for ' . $user->phone,
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully',
                'data' => [
                    'order_id'       => $order->id,
                    'user_id'        => $user->id,
                    'customer_id'    => $customer->id,
                    'membership_end' => $membershipEnd->toDateString(),
                ],
            ]);
        } catch (Exception $e) {
            Log::error('Payment verify error: ' . $e->getMessage());
            if (isset($order)) {
                $order->update(['status' => 'failed']);
            }
            return response()->json([
                'success' => false,
                'message' => 'Server error during verification',
            ]);
        }
    }

    private function generateCardNumber($userId, $tier = 1)
    {
        $prefix = '5214';
        $tierCode = $tier;
        $unique = str_pad($userId, 9, '0', STR_PAD_LEFT);
        $checksum = rand(0, 9);
        return $prefix . '0' . $tierCode . $unique . $checksum;
    }
}
