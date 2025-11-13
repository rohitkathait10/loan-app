@extends('layouts.app')

@section('content')
    <div class="page-inner">
        @if ($broadcastAd)
            <div class="marquee-wrapper">
                <div class="marquee-container">
                    <span class="marquee-icon">🔔</span>
                    <marquee class="marquee-text" behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        {!! $broadcastAd->content !!}
                    </marquee>
                </div>
            </div>
        @endif
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">DASHBOARD</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">DASHBOARD</li>
            </ul>
        </div>

        <div class="row">
        @php
            $cards = [
                ['title' => 'Personal Loan Applications', 'count' => $personalLoanCount, 'icon' => 'fas fa-user'],
                ['title' => 'Business Loan Applications', 'count' => $businessLoanCount, 'icon' => 'fas fa-briefcase'],
            ];
        @endphp


            @foreach ($cards as $card)
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="{{ $card['icon'] }}"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">{{ $card['title'] }}</p>
                                        <h4 class="card-title">{{ $card['count'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-title">Submit Documents</div>
                    </div>
                    <div class="card-body">
                        <p>Dear Sir / Madam,<br>
                            Kindly submit a list of the following documents as per your profile. Send all documents by email
                            to
                            <a href="mailto:support@kaushalcorp.com">support@kredifyloans.com</a>.
                        </p>

                        <ul>
                            <li><strong>Salaried Person:</strong> Aadhar Card, Pan Card, 6-month Bank Statement, Photo,
                                Cancelled Cheque, 3-month Salary Slip, 1-year Form 16</li>
                            <li><strong>Self-Employed Person:</strong> Aadhar Card, Pan Card, 6-month Bank Statement,
                                Photo, Cancelled Cheque, Business Proof, 1-year ITR</li>
                        </ul>

                        <p><strong>Note:</strong> Additional documents may be required based on your profile.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if ($popupAd && $popupAd->image)
        <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $popupAd->image) }}" alt="Welcome" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    @if (session('show_welcome_modal'))
        <script>
            $(document).ready(function() {
                $('#welcomeModal').modal('show');
            });
        </script>
    @endif
@endpush
