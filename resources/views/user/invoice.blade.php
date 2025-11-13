<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice['number'] }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            padding: 25px;
        }

        .invoice-container {
            max-width: 850px;
            margin: 0 auto;
            background-color: white;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 35px;
        }

        .company-cell {
            width: 65%;
            vertical-align: top;
            padding-right: 30px;
        }

        .invoice-cell {
            width: 35%;
            vertical-align: top;
            text-align: right;
        }

        .company-name {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 12px;
            color: #333;
        }

        .company-details {
            color: #666;
            line-height: 1.4;
            font-size: 15px;
        }

        .invoice-title {
            font-size: 54px;
            font-weight: normal;
            margin-bottom: 30px;
            color: #333;
            letter-spacing: 2px;
        }

        .invoice-meta {
            font-size: 15px;
            line-height: 1.4;
        }

        .invoice-meta-row {
            margin-bottom: 12px;
        }

        .invoice-meta strong {
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
            font-size: 16px;
        }

        .bill-to {
            margin: 30px 0 35px 0;
        }

        .section-title {
            font-weight: bold;
            color: #666;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .customer-name {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 6px;
            color: #333;
        }

        .customer-details {
            font-size: 15px;
            color: #666;
            line-height: 1.4;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        .items-table th {
            background-color: #555;
            color: white;
            padding: 16px;
            text-align: left;
            font-weight: normal;
            font-size: 15px;
        }

        .items-table td {
            padding: 16px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
            font-size: 15px;
        }

        .item-description {
            font-weight: bold;
            margin-bottom: 4px;
            color: #333;
            font-size: 16px;
        }

        .card-number {
            color: #888;
            font-size: 14px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .total-row {
            background-color: #f8f8f8;
            border-top: 2px solid #ddd;
        }

        .total-row td {
            font-weight: bold;
            font-size: 18px;
            padding: 20px 16px;
        }

        .payment-section {
            margin: 30px 0;
        }

        .payment-info {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 45px;
        }

        .note-cell {
            width: 65%;
            vertical-align: top;
            padding-right: 30px;
        }

        .authorized-cell {
            width: 35%;
            vertical-align: top;
            text-align: right;
        }

        .note-content {
            font-size: 15px;
            color: #666;
            line-height: 1.4;
        }

        .authorized-label {
            font-style: italic;
            margin-bottom: 6px;
            font-size: 14px;
            color: #888;
        }

        .authorized-name {
            font-weight: bold;
            font-size: 15px;
            color: #333;
        }

        .computer-generated {
            text-align: center;
            margin-top: 55px;
            color: #999;
            font-size: 14px;
            font-style: italic;
        }

        .rupee {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <table class="header-table">
            <tr>
                <td class="company-cell">
                    <div class="company-name">{{ $company['name'] }}</div>
                    <div class="company-details">
                        {{ $company['address'] }}<br>
                        {{ $company['city'] }}<br>
                        {{ $company['state_pin'] }}<br>
                        (M) {{ $company['mobile'] }}<br>
                        (E) {{ $company['email'] }}<br>
                        GST:{{ $company['gst'] }}
                    </div>
                </td>
                <td class="invoice-cell">
                    <div class="invoice-title">INVOICE</div>
                    <div class="invoice-meta">
                        <div class="invoice-meta-row">
                            <strong>Invoice No</strong>
                            {{ $invoice['number'] }}
                        </div>
                        <div class="invoice-meta-row">
                            <strong>Invoice Date</strong>
                            {{ $invoice['date'] }}
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <div class="bill-to">
            <div class="section-title">Bill To</div>
            <div class="customer-name">{{ $customer['name'] }}</div>
            <div class="customer-details">
                {{ $customer['address'] }}<br>
                {{ $customer['city'] }}<br>
                {{ $customer['state'] }} - {{ $customer['pincode'] }}<br>
                (M) {{ $customer['mobile'] }}<br>
                (E) {{ $customer['email'] }}
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 70%;">Item</th>
                    <th class="text-center" style="width: 10%;">Qty</th>
                    <th class="text-right" style="width: 20%;">Amount (<span class="rupee">₹</span>)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            <div class="item-description">{{ $item['description'] }}</div>
                            <div class="card-number">Card Number - {{ $item['card_number'] }}</div>
                        </td>
                        <td class="text-center">{{ $item['quantity'] }}</td>
                        <td class="text-right">{{ number_format($item['amount'], 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="2" class="text-right">Total</td>
                    <td class="text-right"><span class="rupee">&#8377;</span> {{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="payment-section">
            <div class="section-title">Payment Details</div>
            <div class="payment-info">Payment Method: {{ $payment['method'] }}</div>
            <div class="payment-info">Payment Id: {{ $payment['id'] }}</div>
        </div>

        <table class="footer-table">
            <tr>
                <td class="note-cell">
                    <div class="section-title">Note</div>
                    <div class="note-content">{{ $note }}</div>
                </td>
                <td class="authorized-cell">
                    <div class="authorized-label">Authorized person</div>
                    <div class="authorized-name">{{ $authorized_person }}</div>
                </td>
            </tr>
        </table>

        <div class="computer-generated">
            This is Computer generated Invoice. Does not require any signature.
        </div>
    </div>
</body>

</html>
