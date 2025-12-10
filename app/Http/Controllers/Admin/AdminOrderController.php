<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use App\Models\Plan;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();

        return view('admin.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.partials.order-details', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:created,paid,failed'
        ]);

        if ($order->status == "paid") {
            return back()->with('error', 'Order status is already paid, you cannot change it.');
        }

        $order->status = $request->status;
        $order->save();

        if ($order->status == "paid") {
            $customer = Customer::findOrFail($order->customer_id);
            $customer->status = 1;
            $customer->save();

            $plan = Plan::where('id', $order->plan_id)->first();

            $months = $plan->months;

            $membershipTier   = $customer->loan_type === 'business' ? "excellent" : "meta";
            $now              = now();
            $membershipEnd    = $now->copy()->addMonths($months);
            $membershipCardNo = $this->generateCardNumber($customer->id, 1);

            $user = User::firstOrCreate(
                ['email' => $customer->email],
                [
                    'name'                  => $customer->name,
                    'phone'                 => $customer->phone,
                    'loan_type'             => $customer->loan_type,
                    'password'              => bcrypt('12345123'),
                    'salary_type'           => $customer->salary_type,
                    'loan_amount'           => $customer->loan_amount,
                    'cibil_score'           => $customer->cibil_score,
                    'monthly_income'        => $customer->monthly_income,
                    'monthly_emi'           => $customer->monthly_emi,
                    'loan_purpose'          => $customer->loan_purpose,
                    'loan_eligibility'      => $customer->loan_eligibility,
                    'emi_36'                => $customer->emi_36,
                    'emi_48'                => $customer->emi_48,
                    'emi_60'                => $customer->emi_60,
                    'selected_emi'          => $customer->selected_emi,
                    'city_id'               => $customer->city_id,
                    'state_id'              => $customer->state_id,
                    'ip_address'            => $customer->ip_address,
                    'os'                    => $customer->os,
                    'browser'               => $customer->browser,
                    'device_type'           => $customer->device_type,
                    'referred_by'           => $customer->referred_by,
                    'terms_accepted'        => $customer->terms_accepted,
                    'marketing_consent'     => $customer->marketing_consent,
                     'consent_given_at'     => $customer->consent_given_at,
                    'membership_status'     => 1,
                    'membership_start'      => $now,
                    'membership_end'        => $membershipEnd,
                    'membership_tier'       => $membershipTier,
                    'membership_card_number'=> $membershipCardNo,
                    'card_price'            => $order->amount,
                    'base_price'            => $order->base_price,
                ]
            );

            $order->update(['user_id' => $user->id]);
        }


        return back()->with('success', 'Order status updated successfully.');
    }

    private function generateCardNumber($userId, $tier = 1)
    {
        $prefix = '5214';
        $unique = str_pad($userId, 9, '0', STR_PAD_LEFT);
        return $prefix . '0' . $tier . $unique . rand(0, 9);
    }
}
