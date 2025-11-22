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
        $customer = Customer::findOrFail($request->customer_id);

        $amount = $customer->loan_type === 'business' ? 699 : 499;
        $upiId = "Q766305794@ybl";
        $orderIdentifier = "UPI_" . uniqid();

        $upiString = "upi://pay?pa={$upiId}&pn=KredifyLoans&am={$amount}&cu=INR&tn={$orderIdentifier}";

        $folder = 'upi_qr';
        Storage::disk('public')->deleteDirectory($folder);
        Storage::disk('public')->makeDirectory($folder);

        $qrFile = $folder . '/membership.svg';

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
            'amount'            => $amount,
            'currency'          => 'INR',
            'status'            => 'created',
            'upi_link'          => $upiString
        ]);

        return response()->json([
            "success"  => true,
            "order_id" => $order->id, 
            "amount"   => $amount,
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
