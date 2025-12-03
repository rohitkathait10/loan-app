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
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
public function createOrder(Request $request)
{
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'plan_id'     => 'required|exists:plans,id'
    ]);

    $customer = Customer::findOrFail($request->customer_id);

    // Determine plan type for selected plan validation
    $planType = $customer->loan_type === 'business' ? 'business' : 'personal';

    $selectedPlan = Plan::where([
        'id'        => $request->plan_id,
        'plan_type' => $planType
    ])->first();

    if (!$selectedPlan) {
        return response()->json([
            'success' => false,
            'message' => "Invalid plan selected for {$planType} customer."
        ], 400);
    }

    // Previous order?
    $prevOrder = Order::where('customer_id', $customer->id)->first();

    /** ---------------------------------------
     *  CUSTOMER QR DIRECTORY
     * -------------------------------------- */
    $customerDir = storage_path("app/public/upi_qr/" . $customer->id);

    // Create customer folder if missing
    if (!file_exists($customerDir)) {
        mkdir($customerDir, 0777, true);
    }

    // ========= IF PREVIOUS ORDER EXISTS ===========
    if ($prevOrder) {

        // Block if already paid
        if (!empty($prevOrder->utr) || !empty($prevOrder->payment_screenshot)) {
            return response()->json([
                'success' => false,
                'message' => "Payment already completed. You cannot create or change order."
            ], 400);
        }

        // Same plan → return old order
        if ($prevOrder->plan_id == $selectedPlan->id) {
            return response()->json([
                "success"     => true,
                "message"     => "Unpaid order already exists.",
                "order_id"    => $prevOrder->id,
                "customer_id" => $prevOrder->customer_id,
                "amount"      => $prevOrder->amount,
                "plan"        => [
                    'id'     => $prevOrder->plan_id,
                    'months' => $prevOrder->plan->months ?? null,
                    'price'  => $prevOrder->amount
                ],
                "qr_url"      => $prevOrder->qr_url ?? null,
                "upi_link"    => $prevOrder->upi_link
            ]);
        }

        // DIFFERENT PLAN → UPDATE OLD ORDER
        DB::beginTransaction();
        try {

            $amount = $selectedPlan->price;
            $upiId  = "Q766305794@ybl";
            $orderIdentifier = "UPI_" . uniqid();
            $upiString = "upi://pay?pa={$upiId}&pn=KredifyLoans&am={$amount}&cu=INR&tn={$orderIdentifier}";

            /** ---------------------------------------
             *  DELETE OLD QR FILES
             * -------------------------------------- */
            $oldFiles = glob($customerDir . "/*");
            foreach ($oldFiles as $f) unlink($f);

            /** ---------------------------------------
             *  CREATE NEW QR
             * -------------------------------------- */
            $filename = $orderIdentifier . ".svg";
            $qrFile = $customerDir . "/" . $filename;

            $renderer = new ImageRenderer(new RendererStyle(400), new SvgImageBackEnd());
            $writer   = new Writer($renderer);
            file_put_contents($qrFile, $writer->writeString($upiString));

            // Public URL
            $qrUrl = asset("storage/upi_qr/{$customer->id}/{$filename}");

            /** ---------------------------------------
             *  UPDATE ORDER
             * -------------------------------------- */
            $prevOrder->cashfree_order_id = $orderIdentifier;
            $prevOrder->plan_id = $selectedPlan->id;
            $prevOrder->amount = $amount;
            $prevOrder->currency = 'INR';
            $prevOrder->status = 'created';
            $prevOrder->upi_link = $upiString;
            $prevOrder->qr_url = $qrUrl;
            $prevOrder->save();

            DB::commit();

            return response()->json([
                "success"     => true,
                "message"     => "Existing unpaid order updated to the new plan.",
                "order_id"    => $prevOrder->id,
                "customer_id" => $prevOrder->customer_id,
                "amount"      => $prevOrder->amount,
                "plan"        => $selectedPlan->only(['id','months','price']),
                "qr_url"      => $qrUrl,
                "upi_link"    => $upiString
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update order.'
            ], 500);
        }
    }

    // ========== NO PREVIOUS ORDER → CREATE NEW ===========
    DB::beginTransaction();
    try {

        $amount = $selectedPlan->price;
        $upiId  = "Q766305794@ybl";
        $orderIdentifier = "UPI_" . uniqid();
        $upiString = "upi://pay?pa={$upiId}&pn=KredifyLoans&am={$amount}&cu=INR&tn={$orderIdentifier}";

        /** ---------------------------------------
         * CLEAN CUSTOMER FOLDER (no duplicates)
         * -------------------------------------- */
        $oldFiles = glob($customerDir . "/*");
        foreach ($oldFiles as $f) unlink($f);

        /** ---------------------------------------
         * CREATE QR FILE
         * -------------------------------------- */
        $filename = $orderIdentifier . ".svg";
        $qrFile = $customerDir . "/" . $filename;

        $renderer = new ImageRenderer(new RendererStyle(400), new SvgImageBackEnd());
        $writer   = new Writer($renderer);
        file_put_contents($qrFile, $writer->writeString($upiString));

        $qrUrl = asset("storage/upi_qr/{$customer->id}/{$filename}");

        /** ---------------------------------------
         * CREATE ORDER
         * -------------------------------------- */
        $order = Order::create([
            'cashfree_order_id' => $orderIdentifier,
            'customer_id'       => $customer->id,
            'plan_id'           => $selectedPlan->id,
            'amount'            => $amount,
            'currency'          => 'INR',
            'status'            => 'created',
            'upi_link'          => $upiString,
            'qr_url'            => $qrUrl
        ]);

        DB::commit();

        return response()->json([
            "success"     => true,
            "message"     => "Order created successfully.",
            "order_id"    => $order->id,
            "customer_id" => $order->customer_id,
            "amount"      => $amount,
            "plan"        => $selectedPlan->only(['id','months','price']),
            "qr_url"      => $qrUrl,
            "upi_link"    => $upiString
        ]);

    } catch (\Throwable $e) {
        DB::rollBack();
        return response()->json([
            'success' => false,
            'message' => 'Failed to create order.'
        ], 500);
    }
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
        
        $customer = Customer::findOrFail($request->customer_id);
        $customer->status = 1;
        $customer->save();

        return response()->json([
            'message' => 'Payment submitted successfully.',
            'order'   => $order
        ], 200);
    }
}
