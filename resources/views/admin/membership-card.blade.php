@extends('layouts.app')

@section('content')
    @php
        $validFrom = now()->format('d/m/Y');
        $validTo = now()->addMonths(6)->format('d/m/Y');
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
                    <a href="#" class="btn btn-danger btn-round me-2" id="downloadGoldCardBtn">Download Excellent
                        Card</a>
                    <a href="#" class="btn btn-warning btn-round me-2" id="downloadSilverCardBtn">Download Meta
                        Card</a>

                </div>
            </div>

            <div class="card card-round w-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center mb-4">
                            <div class="membership-card-container" id="GoldMembershipCard">
                                <img src="{{ asset('admin/assets/img/card/excellent-membership-card.png') }}"
                                    alt="Excellent Membership Card" class="membership-card-image">
                                <div class="card-text-overlay">
                                    <div class="card-header-row">
                                        <div class="card-website">kredifyloans.com</div>
                                        <div class="card-type">Excellent Membership Card</div>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-number">**** **** **** 4526</div>
                                    <div class="card-validity">
                                        VALID FROM {{ $validFrom }} &nbsp; VALID TO {{ $validTo }}
                                    </div>
                                    <div class="card-holder-name">Full Name</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 text-center mb-4">
                            <div class="membership-card-container" id="membershipCard">
                                <img src="{{ asset('admin/assets/img/card/meta-membership-card.png') }}"
                                    alt="Meta Membership Card" class="membership-card-image">
                                <div class="card-text-overlay">
                                    <div class="card-header-row">
                                        <div class="card-website">kredifyloans.com</div>
                                        <div class="card-type">Meta Membership Card</div>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-number">**** **** **** 4526</div>
                                    <div class="card-validity">
                                        VALID FROM {{ $validFrom }} &nbsp; VALID TO {{ $validTo }}
                                    </div>
                                    <div class="card-holder-name">Full Name</div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function downloadCard(elementId, fileName) {
            const element = document.querySelector(elementId);

            html2canvas(element, {
                backgroundColor: null,
                useCORS: true,
                scale: 2,
                logging: false,
                scrollX: 0,
                scrollY: 0,
                windowWidth: document.documentElement.offsetWidth,
                windowHeight: document.documentElement.offsetHeight
            }).then(canvas => {
                const trimmed = trimCanvas(canvas);
                const link = document.createElement('a');
                link.download = fileName;
                link.href = trimmed.toDataURL("image/png");
                link.click();
            });
        }

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

        document.getElementById('downloadGoldCardBtn').addEventListener('click', function(e) {
            e.preventDefault();
            downloadCard("#GoldMembershipCard", "excellent-membership-card.png");
        });

        document.getElementById('downloadSilverCardBtn').addEventListener('click', function(e) {
            e.preventDefault();
            downloadCard("#membershipCard", "meta-membership-card.png");
        });
    </script>
@endpush
