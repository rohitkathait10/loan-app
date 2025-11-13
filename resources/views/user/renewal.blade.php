@extends('layouts.kyc')

@section('content')
    @php
        $validFrom = now()->format('d/m/Y');
        $validTo = now()->addMonths(6)->format('d/m/Y');
    @endphp

    <div class="loan-backcolor py-5">
        <section class="container section-padding text-dark">

            <!-- Page Title -->
            <div class="container text-center mb-4">
                <h2>Time to Renew Your Membership!</h2>
                <p class="text-muted">Let’s keep your loan benefits rolling in. Renew now and stay ahead! 🚀</p>
            </div>

            <!-- Renewal Message -->
            <div class="alert alert-info text-center fs-6 fw-semibold">
                Your membership has expired. Renew now to regain full access to premium features, loan tracking, and
                priority support!
            </div>

            <div class="card shadow-sm p-4">

                <!-- Progress Bar -->
                <div class="mb-4">
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 15px;">
                            <div class="progress-bar bg-warning" style="width: 100%;">100%</div>
                        </div>
                        <span class="ms-3 fw-bold">Final Step</span>
                    </div>
                </div>

                <h5 class="text-warning fw-bold">Renew Your Membership Card</h5>
                <hr>

                <div class="row justify-content-center">
                    <!-- Membership Card Preview -->
                    <div class="col-md-6 mb-4">
                        <div class="membership-card-container">
                            <img src="{{ asset('asset/img/card/silver-membership-card.png') }}" alt="Membership Card"
                                class="membership-card-image">

                            <!-- Text overlay -->
                            <div class="card-text-overlay">
                                <div class="card-header-row">
                                    <div class="card-website">kredifyloans.com</div>
                                    <div class="card-type">Silver Membership Card</div>
                                </div>

                                <div class="card-divider"></div>
                                <div class="card-number">**** **** **** 4526</div>
                                <div class="card-validity">
                                    VALID FROM {{ $validFrom }} &nbsp;&nbsp; VALID TO {{ $validTo }}
                                </div>
                                <div class="card-holder-name">{{ auth()->user()->name }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div class="col-md-6 text-center">
                        <ul class="list-unstyled">
                            <li><strong>Membership Renewal Fee:</strong></li>
                            <li><del>₹2499</del> <span class="text-success fw-bold">₹499 only</span></li>
                            <li class="text-danger">Limited Time Offer – No GST</li>
                        </ul>

                        <!-- Razorpay Form -->
                        <form name="razorpay-form"
                            action="{{ route('razorpay.payment.success', ['id' => auth()->user()->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                            <button id="rzp-button" type="button" class="btn btn-orange px-5 py-2">
                                Renew Now
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Benefits Section -->
                <div class="mt-4">
                    <p class="mb-1">
                        🎁 Continue enjoying:<br>
                        • Access to loans from multiple banks<br>
                        • 4 years of free loan consultancy<br>
                        • 30% referral bonus<br>
                        • Priority support & on-call assistance<br>
                        • Loan offers anytime, anywhere
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- Razorpay Script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        const options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": 49900,
            "currency": "INR",
            "name": "Kredify Loans",
            "description": "Membership Renewal",
            "image": "{{ asset('your-logo.png') }}",
            "handler": function(response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.forms['razorpay-form'].submit();
            },
            "prefill": {
                "name": "{{ auth()->user()->name }}",
                "email": "{{ auth()->user()->email ?? 'test@example.com' }}",
                "contact": "{{ auth()->user()->phone }}"
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        const rzp1 = new Razorpay(options);
        document.getElementById('rzp-button').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
@endsection

@push('scripts')
    @if (session('swal'))
        <script>
            Swal.fire({
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                icon: '{{ session('swal.icon') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endpush
