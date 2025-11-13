<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-lead-circle me-2"></i>Lead Details</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $lead->name }}</p>
                <p><strong>Phone:</strong> <span class="badge bg-info">{{ $lead->phone }}</span></p>
                <p><strong>Email:</strong> {{ $lead->email }}</p>
                <p><strong>Salary Type:</strong> {{ $lead->salary_type }}</p>
                <p><strong>CIBIL Score:</strong> <span class="badge bg-warning text-dark">{{ $lead->cibil_score }}</span>
                </p>
            </div>

            <div class="col-md-6">
                <p><strong>Loan Amount:</strong> ₹{{ number_format($lead->loan_amount, 2) }}</p>
                <p><strong>Monthly Income:</strong> ₹{{ number_format($lead->monthly_income, 2) }}</p>
                <p><strong>Loan Purpose:</strong> {{ $lead->loan_purpose }}</p>
                <p><strong>State:</strong> {{ $lead->state->name ?? 'N/A' }}</p>
                <p><strong>City:</strong> {{ $lead->city->city ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
</div>
