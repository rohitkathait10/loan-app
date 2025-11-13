@extends('layouts.app')

@section('content')
<div class="page-inner">
    <div class="card mt-5 p-4">
        <h3 class="text-success fw-bold">🎉 Congratulations!</h3>
        <p class="fs-5">Your loan application has been successfully submitted and is now under review.</p>
        
        <div class="mt-3">
            <p><strong>✅ Loan Amount Approved:</strong> ₹{{ number_format($loan->amount) }}</p>
            <p><strong>📅 Tenure Chosen:</strong> {{ $loan->tenure_months }} months</p>
            <p><strong>💰 EMI Amount:</strong> ₹{{ number_format($loan->emi_amount, 2) }} per month</p>
        </div>

        <hr class="my-4">

        <div class="alert alert-info">
            <h5 class="fw-bold mb-2">📄 Next Step: Complete Your KYC</h5>
            <p class="mb-0">Please submit your necessary documents under the <strong>KYC section</strong> in the menu. This helps us verify your details faster.</p>
            <p class="mt-2 mb-0">Our team will review your profile and contact you shortly for the next steps in your loan process.</p>
        </div>

        <a href="{{ route('user.dashboard') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
</div>
@endsection
