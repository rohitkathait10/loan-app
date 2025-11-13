@extends('layouts.app')

@section('content')
    @php
        $validFrom = $validFrom;
        $validTo = $validTo;
    @endphp
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">MEMBERSHIP CARD</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">MEMBERSHIP CARD</li>
            </ul>
        </div>

        <div class="row mt-4">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">

                <div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2" id="downloadCardBtn">Download Membership
                        Card</a>
                    <a href="{{ route('user.invoice.download') }}" class="btn btn-primary btn-round"
                        target="_blank">Invoice</a>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="membership-card-container" id="membershipCard">
                            <img src="{{ asset('admin/assets/img/card/meta-membership-card.png') }}"
                                alt="Meta Membership Card" class="membership-card-image">

                            <div class="card-text-overlay">
                                <div class="card-header-row">
                                    <div class="card-website">kredifyloans.com</div>
                                    <div class="card-type">Meta Membership Card</div>
                                </div>

                                <div class="card-divider"></div>

                                <div class="card-number" id="cardNumberElement"></div>

                                <div class="card-validity">
                                    VALID FROM {{ $validFrom }} &nbsp; VALID TO {{ $validTo }}
                                </div>

                               <div class="card-holder-name">{{ ucwords($user->name) }}</div>

                            </div>
                        </div>
                        <div class="mt-4">
                            <h3>Membership Card Benefits</h3>
                            <div>
                                (1) Let you apply for personal loan in multiple banks (2) You get 2 years free loan
                                consultancy
                                (3) Get 35% referral payout bonus (4) Get loan offers from multiple banks anytime-anywhere
                                (5)
                                You stay at home; our team will go to multiple banks for you (6) On-call Assistance on all
                                your
                                doubts
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let rawNumber = "{{ $user->membership_card_number }}";
        let lastFour = rawNumber.slice(-4);
        let formattedNumber = "**** **** **** " + lastFour;
        document.getElementById("cardNumberElement").innerText = formattedNumber;

        function trimCanvas(canvas) {
            const ctx = canvas.getContext('2d');
            const pixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const bound = {
                top: null,
                left: null,
                right: null,
                bottom: null
            };

            for (let y = 0; y < pixels.height; y++) {
                for (let x = 0; x < pixels.width; x++) {
                    const idx = (y * pixels.width + x) * 4;
                    if (pixels.data[idx + 3] !== 0) {
                        if (bound.top === null) bound.top = y;
                        if (bound.left === null || x < bound.left) bound.left = x;
                        if (bound.right === null || x > bound.right) bound.right = x;
                        bound.bottom = y;
                    }
                }
            }

            const trimHeight = bound.bottom - bound.top;
            const trimWidth = bound.right - bound.left;
            const trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);
            const copy = document.createElement('canvas');
            copy.width = trimWidth;
            copy.height = trimHeight;
            copy.getContext('2d').putImageData(trimmed, 0, 0);
            return copy;
        }

        document.getElementById('downloadCardBtn').addEventListener('click', function(e) {
            e.preventDefault();

            const cardNumberElement = document.querySelector(".card-number");
            const originalCardNumber = cardNumberElement.innerText;

            const rawNumber = "{{ $user->membership_card_number }}";
            const formattedNumber = rawNumber.replace(/(.{4})/g, "$1 ").trim();
            cardNumberElement.innerText = formattedNumber;

            html2canvas(document.querySelector("#membershipCard"), {
                backgroundColor: null,
                useCORS: true,
                scale: 2,
                scrollX: 0,
                scrollY: 0,
                logging: false,
                windowWidth: document.documentElement.offsetWidth,
                windowHeight: document.documentElement.offsetHeight
            }).then(canvas => {
                const trimmed = trimCanvas(canvas);
                const link = document.createElement('a');
                link.download = 'membership-card.png';
                link.href = trimmed.toDataURL("image/png");
                link.click();

                cardNumberElement.innerText = originalCardNumber;
            });
        });
    </script>
@endpush
