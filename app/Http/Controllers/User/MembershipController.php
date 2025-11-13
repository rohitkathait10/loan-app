<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    private function generateUniqueInvoiceNumber()
    {
        do {
            $number = random_int(10000, 99999); 
        } while (Invoice::where('invoice_number', $number)->exists());
            return $number;
        }

    public function index()
    {
        $user = Auth::user();

        $validFrom = $user->membership_start
            ? Carbon::parse($user->membership_start)->format('d/m/Y')
            : now()->format('d/m/Y');

        $validTo = $user->membership_end
            ? Carbon::parse($user->membership_end)->format('d/m/Y')
            : now()->addMonths(6)->format('d/m/Y');

        return view('user.membership-card', compact('user', 'validFrom', 'validTo'));
    }
    public function downloadInvoice()
    {
        $user = Auth::user();

        $invoice = Invoice::where('user_id', $user->id)->latest()->first();

        if (!$invoice) {

            $invoiceNumber = $this->generateUniqueInvoiceNumber(); 

            $generatedCardNumber = $user->membership_card; 
            $paymentId = $user->last_payment_id; 

            $invoice = Invoice::create([
                'user_id' => $user->id,
                'invoice_number' => $invoiceNumber,
                'payment_id' => $paymentId,
                'card_number' => $generatedCardNumber,
                'amount' => 499,
            ]);
        }

        $order = Order::where('user_id', $user->id)->latest()->first();

        $invoiceData = [
            'company' => [
                'name' => 'Kredifyloans Corporate',
                'address' => 'Flat No 153, SANJAY NAGAR,',
                'city' => 'Dewas,',
                'state_pin' => 'Madhya Pradesh - 455001',
                'mobile' => '+91-9428686960',
                'email' => 'info@kredifyloans.com',
                'gst' => '23AZAPB9160F1ZU'
            ],
            'invoice' => [
                'number' => $invoice->invoice_number,
                'date' => $invoice->created_at->format('d/m/Y')
            ],
            'customer' => [
                'name' => $user->name,
                'address' => $user->address ?? '',
                'state' => optional($user->state)->name ?? 'N/A',
                'city'  => optional($user->city)->city ?? 'N/A',
                'pincode' => $user->pincode ?? '',
                'mobile' => $user->phone,
                'email' => $user->email
            ],
            'items' => [
                [
                    'description' => 'Membership Card',
                    'card_number' => $user->membership_card_number,
                    'quantity' => 1,
                    'amount' => $user->card_price
                ]
            ],
            'total' => $user->card_price,
            'payment' => [
                'method' => 'Online Payment',
                'id' => $order->razorpay_order_id
            ],
            'note' => "Payment is refundable only in accordance with the company's Return & Refund Policy.",
            'authorized_person' => 'Kredifyloans Corporate'
        ];

        $pdf = Pdf::loadView('user.invoice', $invoiceData)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'defaultFont' => 'Arial',
                'isRemoteEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'margin_top' => 10,
                'margin_right' => 10,
                'margin_bottom' => 10,
                'margin_left' => 10
            ]);

        return $pdf->download('invoice-' . $invoiceData['invoice']['number'] . '.pdf');
    }
}
