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
use Illuminate\Support\Facades\Http;
use Exception;

class PaymentController extends Controller
{
    private $baseUrl;
    private $appId;
    private $secretKey;

    public function __construct()
    {
        if (env('CASHFREE_ENV') === 'production') {
            $this->baseUrl = 'https://api.cashfree.com/pg/orders';
            $this->appId = env('CASHFREE_KEY');
            $this->secretKey = env('CASHFREE_SECRET');
        } else {
            $this->baseUrl = 'https://sandbox.cashfree.com/pg/orders';
            $this->appId = env('CASHFREE_TEST_KEY');
            $this->secretKey = env('CASHFREE_TEST_SECRET');
        }
    }

    public function createOrder(Request $request)
    {

        try {

            $customer = Customer::findOrFail($request->customer_id);

            $amount = $customer->loan_type === 'business' ? 699 : 1;
            $orderId = 'CF_' . uniqid();

            $orderResponse = Http::withHeaders([
                'x-client-id'     => $this->appId,
                'x-client-secret' => $this->secretKey,
                'x-api-version'   => '2023-08-01',
                'Content-Type'    => 'application/json',
            ])->post($this->baseUrl, [
                'order_id'         => $orderId,
                'order_amount'     => $amount,
                'order_currency'   => 'INR',
                'customer_details' => [
                    'customer_id'    => (string) $customer->id,
                    'customer_name'  => $customer->name,
                    'customer_email' => $customer->email ?? 'user_' . uniqid() . '@demo.com',
                    'customer_phone' => $customer->phone,
                ],
                'order_meta' => [
                    'payment_methods' => 'cc,dc,upi,nb',
                ],
            ]);

            $orderData = $orderResponse->json();

            if (!$orderResponse->successful()) {
                Log::error('Cashfree API Error:', [
                    'status' => $orderResponse->status(),
                    'body'   => $orderResponse->body()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Cashfree API error',
                    'error'   => $orderResponse->json()
                ], 500);
            }

            if (empty($orderData['payment_session_id'])) {
                Log::error('Cashfree Missing payment_session_id:', $orderData);

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid response from Cashfree (no payment_session_id)',
                    'data'    => $orderData
                ], 500);
            }

            Order::create([
                'cashfree_order_id' => $orderId,
                'customer_id'       => $customer->id,
                'amount'            => $amount,
                'currency'          => 'INR',
                'status'            => 'created',
            ]);

            return response()->json([
                'success'            => true,
                'order_id'           => $orderId,
                'payment_session_id' => $orderData['payment_session_id'],
                'amount'             => $amount,
                'currency'           => 'INR',
                'key'                => $this->appId,
            ]);
        } catch (Exception $e) {
            Log::error('createOrder() Exception:', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Order creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        $request->validate([
            'order_id'   => 'required|string',
            'customer_id' => 'required|integer|exists:customers,id',
        ]);

        try {

            $order = Order::where('cashfree_order_id', $request->order_id)->first();

            if (!$order) {
                Log::debug('Order not found', ['order_id' => $request->order_id]);
                return response()->json(['success' => false, 'message' => 'Order not found']);
            }

            if ($order->status === 'paid') {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment already processed',
                    'data' => [
                        'order_id' => $order->id,
                        'user_id'  => $order->user_id,
                    ]
                ]);
            }

            $response = Http::withHeaders([
                'x-client-id'     => $this->appId,
                'x-client-secret' => $this->secretKey,
                'x-api-version'   => '2023-08-01',
            ])->get($this->baseUrl . '/' . $request->order_id);

            $data = $response->json();

            if (!isset($data['order_status'])) {
                Log::error('Invalid response from Cashfree', ['data' => $data]);
                return response()->json(['success' => false, 'message' => 'Invalid response from Cashfree']);
            }

            if ($data['order_status'] === 'PAID') {

                $order->update([
                    'status' => 'paid',
                    'payment_id' => $data['cf_payment_id'] ?? null
                ]);

                $customer = Customer::findOrFail($request->customer_id);
                $customer->update(['status' => 1]);

                $membershipTier   = $customer->loan_type === 'business' ? "excellent" : "meta";
                $now              = now();
                $membershipEnd    = $now->copy()->addMonths(6);
                $membershipCardNo = $this->generateCardNumber($customer->id, 1);

                $user = User::firstOrCreate(
                    ['email' => $customer->email],
                    [
                        'name'              => $customer->name,
                        'phone'             => $customer->phone,
                        'loan_type'         => $customer->loan_type,
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
                        'membership_card_number' => $membershipCardNo,
                        'card_price'        => $order->amount,
                    ]
                );


                $order->update(['user_id' => $user->id]);

                if ($customer->referred_by && !$order->referral_reward_given) {

                    $referrer = User::where('referral_code', $customer->referred_by)->first();

                    if ($referrer) {
                        $referrer->increment('wallet_balance', 50);

                        ReferralReward::create([
                            'referrer_id'      => $referrer->id,
                            'referred_user_id' => $user->id,
                            'amount'           => 50,
                            'note'             => 'Referral reward for ' . $user->phone,
                        ]);

                        $order->update(['referral_reward_given' => 1]);
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
            }
            $order->update(['status' => 'failed']);
            return response()->json(['success' => false, 'message' => 'Payment not completed']);
        } catch (Exception $e) {

            Log::error('Cashfree verifyPayment error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if (isset($order)) {
                $order->update(['status' => 'failed']);
            }

            return response()->json(['success' => false, 'message' => 'Verification failed']);
        }
    }

    private function generateCardNumber($userId, $tier = 1)
    {
        $prefix = '5214';
        $unique = str_pad($userId, 9, '0', STR_PAD_LEFT);
        return $prefix . '0' . $tier . $unique . rand(0, 9);
    }
}
