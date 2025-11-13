<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>Customer Details</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Phone:</strong> <span class="badge bg-info">{{ $user->phone }}</span></p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Salary Type:</strong> {{ $user->salary_type }}</p>
                <p><strong>CIBIL Score:</strong> <span class="badge bg-warning text-dark">{{ $user->cibil_score }}</span>
                </p>
            </div>

            <div class="col-md-6">
                <p><strong>Loan Amount:</strong> ₹{{ number_format($user->loan_amount, 2) }}</p>
                <p><strong>Monthly Income:</strong> ₹{{ number_format($user->monthly_income, 2) }}</p>
                <p><strong>Loan Purpose:</strong> {{ $user->loan_purpose }}</p>
                <p><strong>State:</strong> {{ $user->state->name ?? 'N/A' }}</p>
                <p><strong>City:</strong> {{ $user->city->city ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
</div>
