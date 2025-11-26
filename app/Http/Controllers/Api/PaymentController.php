<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\Plan;
use App\Models\ReferralReward;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'plan_id'     => 'required|exists:plans,id'
        ]);

        $customer = Customer::findOrFail($request->customer_id);

        $planType = $customer->loan_type == 'business' ? 'business' : 'personal';

        $selectedPlan = Plan::where('id', $request->plan_id)
            ->where('plan_type', $planType)
            ->first();

        if (!$selectedPlan) {
            return response()->json([
                'success' => false,
                'message' => "Invalid plan selected for {$planType} customer."
            ], 400);
        }

        $amount = $selectedPlan->price;
        $upiId = "Q766305794@ybl";
        $orderIdentifier = "UPI_" . uniqid();

        $upiString = "upi://pay?pa={$upiId}&pn=KredifyLoans&am={$amount}&cu=INR&tn={$orderIdentifier}";

        $folder = 'upi_qr';
        Storage::disk('public')->makeDirectory($folder);

        $filename = $orderIdentifier . '.svg';
        $qrFile = $folder . '/' . $filename;

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrSvg = $writer->writeString($upiString);

        Storage::disk('public')->put($qrFile, $qrSvg);

        $qrUrl = asset('storage/' . $qrFile);

        $order = Order::create([
            'cashfree_order_id' => $orderIdentifier,
            'customer_id'       => $customer->id,
            'plan_id'           => $selectedPlan->id,
            'amount'            => $amount,
            'currency'          => 'INR',
            'status'            => 'created',
            'upi_link'          => $upiString
        ]);

        return response()->json([
            "success"  => true,
            "message"  => "Order created successfully.",
            "order_id" => $order->id,
            "customer_id" => $order->customer_id,
            "amount"   => $amount,
            "plan"     => $selectedPlan->only(['id', 'months', 'price']),
            "qr_url"   => $qrUrl,
            "upi_link" => $upiString
        ]);
    }


    public function verifyPayment(Request $request)
    {
        $request->validate([
            'customer_id'        => 'required|integer',
            'order_id'           => 'required|integer|exists:orders,id',
            'utr'                => 'required|string|max:255',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $order = Order::find($request->order_id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found.'
            ], 404);
        }

        $screenshotPath = $request->file('payment_screenshot')
            ->store('payment_screenshots', 'public');

        $order->utr = $request->utr;
        $order->payment_screenshot = $screenshotPath;
        $order->save();

        return response()->json([
            'message' => 'Payment submitted successfully.',
            'order'   => $order
        ], 200);
    }
}
