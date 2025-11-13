@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">DIGITAL {{ strtoupper($loan->loan_type) }} LOAN APPLICATION</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator"><i class="fas fa-chevron-right"></i></li>
                <li class="nav-item">DIGITAL {{ strtoupper($loan->loan_type) }} LOAN APPLICATION</li>
            </ul>
        </div>

        <div class="row mt-4 text-center">
            <div class="col-md-12 mb-4">
                <div class="card card-round h-100">
                    <div class="card-body">
                        <h5 class="text-success fw-bold">
                            You Did It! 🎉 You're Eligible for a {{ ucwords(strtolower($loan->loan_type)) }} Loan of
                            ₹{{ number_format($loan['approval_details']['max_loan_amount']) }}
                        </h5>

                        <p>
                            Based on your request for <strong>₹{{ number_format($loan->amount) }}</strong>, we’ve secured
                            exclusive EMI plans for you. Choose the one that suits you best:
                        </p>

                        <form action="{{ route('user.personal.store.approval', ['loan_id' => $loan->id]) }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf

                            <div class="w-100" style="max-width: 400px;">
                                @foreach ([['months' => 36, 'amount' => $loan['approval_details']['emi_36']], ['months' => 48, 'amount' => $loan['approval_details']['emi_48']], ['months' => 60, 'amount' => $loan['approval_details']['emi_60']]] as $option)
                                    <div
                                        class="form-check d-flex justify-content-between align-items-center mb-1 py-1 border rounded px-3">
                                        <input class="form-check-input" type="radio" name="emiOption"
                                            id="emi{{ $option['months'] }}" value="{{ $option['months'] }}"
                                            {{ $option['months'] === 60 ? 'checked' : '' }}>
                                        <label class="form-check-label flex-grow-1 ms-2" for="emi{{ $option['months'] }}">
                                            {{ $option['months'] }} Months
                                        </label>
                                        <span><strong>₹{{ number_format($option['amount'], 2) }}</strong></span>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 px-4">Claim My Offer</button>
                        </form>

                        <p class="mt-3 text-muted">
                            Example: ₹1,982/month for ₹1,00,000 loan @ 12.5% over 6 years. Final approval and amount are
                            subject to your credit profile and lender's policy.
                        </p>

                        <hr class="w-100 my-3">

                        <p class="text-center">
                            Wondering how this was calculated?
                            <a href="#" class="text-primary" data-bs-toggle="modal"
                                data-bs-target="#eligibilityModal">
                                Learn more here
                            </a>
                        </p>

                        <!-- Modal -->
                        <div class="modal fade mt-5" id="eligibilityModal" tabindex="-1"
                            aria-labelledby="eligibilityModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eligibilityModalLabel">How Eligibility Works</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        The offer you see is based on your shared details. Final eligibility depends on your
                                        credit history, income verification, and supporting documents.
                                        Our partnered banks will review your profile and finalize your approved loan amount
                                        and terms.
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary w-40" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        window.addEventListener('load', () => {
            const duration = 2 * 1000;
            const animationEnd = Date.now() + duration;
            const defaults = {
                startVelocity: 30,
                spread: 360,
                ticks: 60,
                zIndex: 2000
            };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            const interval = setInterval(() => {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                const particleCount = 50 * (timeLeft / duration);
                confetti(Object.assign({}, defaults, {
                    particleCount,
                    origin: {
                        x: randomInRange(0.1, 0.9),
                        y: Math.random() - 0.2
                    }
                }));
            }, 250);
        });
    </script>
@endpush
