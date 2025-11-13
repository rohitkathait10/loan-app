@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">Referral</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator"><i class="fas fa-chevron-right"></i></li>
                <li class="nav-item">Referral</li>
            </ul>
        </div>

        <!-- Referral Card -->
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <div class="card text-center shadow p-4">
                    <div class="card-body">
                        <i class="fas fa-badge-dollar fa-3x text-warning mb-3"></i>
                        <h2 class="mb-3 font-weight-bold text-success">Earn ₹50 Instantly!</h2>
                        <p class="text-muted mb-4">
                            Share your referral link with friends. When they apply for a loan and purchase a membership,
                            <strong>you instantly earn ₹50</strong> in your wallet.
                        </p>

                        @if (auth()->user()->referral_code)

                            <div class="mb-4">
                                <h5 class="mb-2 text-primary">Your Referral Code</h5>
                                <span class="badge bg-success text-white p-2 fs-5">
                                    {{ auth()->user()->referral_code }}
                                </span>
                            </div>

                            @php
                                // Use Static React Website Link
                                $referralLink = 'https://kredifyloans.com/personal?ref=' . auth()->user()->referral_code;

                                // Share Texts
                                $waText = 'Hey! Apply for a personal loan on KredifyLoans and get instant approval. Use my referral link: ' . $referralLink;
                                $tgText = 'Apply for a loan & earn rewards!';
                            @endphp

                            <!-- Copy Referral Link -->
                            <div class="input-group mb-3 justify-content-center">
                                <input type="text" class="form-control text-center w-50" id="referralLink"
                                    value="{{ $referralLink }}" readonly>
                                <button class="btn btn-outline-primary" onclick="copyReferralLink()">
                                    <i class="fas fa-copy"></i> Copy
                                </button>
                            </div>

                            <!-- Share Buttons -->
                            <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($waText) }}"
                                    class="btn btn-success me-2" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-whatsapp"></i> Share on WhatsApp
                                </a>

                                <a href="https://t.me/share/url?url={{ urlencode($referralLink) }}&text={{ urlencode($tgText) }}"
                                    class="btn btn-info text-white" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-telegram-plane"></i> Share on Telegram
                                </a>
                            </div>

                            <p class="text-muted mt-3">
                                Click a button to share your link. Earn ₹50 each time a friend buys the membership.
                            </p>

                        @else
                            <form action="{{ route('user.generate.referal') }}" method="POST">
                                @csrf
                                <button class="btn btn-primary px-4 py-2 mt-4">
                                    Generate My Referral Code
                                </button>
                            </form>
                        @endif

                        <hr class="my-4">

                        <div class="alert alert-info" role="alert">
                            🎁 <strong>Pro Tip:</strong> The more friends you refer, the more you earn. There's no limit!
                        </div>
                    </div>
                </div>

                @if ($referal_users->count() > 0)
                    <div class="card shadow mt-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0 text-dark fw-bold">
                                👥 Users Referred by You ({{ $referal_users->count() }})
                            </h5>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered mb-0 text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Money Earn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($referal_users as $index => $refUser)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $refUser->name }}</td>
                                            <td>{{ $refUser->phone }}</td>
                                            <td><span class="badge bg-success">₹50</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <div class="card shadow p-4 mt-4 text-center">
                    <h5 class="text-primary mb-3">Your Total Wallet Balance</h5>
                    <div class="d-flex justify-content-center">
                        <span class="badge bg-success fs-5 py-2 px-4 mx-auto">
                            ₹{{ number_format(auth()->user()->wallet_balance ?? 0) }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function copyReferralLink() {
            const input = document.getElementById("referralLink");
            input.select();
            input.setSelectionRange(0, 99999);
            document.execCommand("copy");

            swal("Copied!", "Your referral link has been copied to clipboard.", {
                icon: "success",
                buttons: {
                    confirm: {
                        className: "btn btn-success"
                    }
                }
            });
        }
    </script>
@endpush
