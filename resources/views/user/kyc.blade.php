@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">KYC DOCUMENTS</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">KYC DOCUMENTS</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach (['Profile Photo', 'Aadhar Card', 'PAN Card', 'Address Proof - Light bill', 'Cancel Cheque', 'Bank Statement - Last 6 months', 'Form 16', 'Salary Slip'] as $doc)
                                <li class="list-group-item d-flex align-items-center text-danger">
                                    <i class="fas fa-exclamation-circle me-2"></i> {{ $doc }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <p class="text-danger mt-2">
                    <strong>Note:</strong> All of the above documents are not mandatory. Provide what you have.
                </p>
            </div>

            <div class="col-lg-9">
                <form id="kycForm" method="POST" action="{{ route('user.kyc.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        @foreach (['Profile Photo', 'Aadhar Card Number' => 'number', 'Aadhar Card', 'PAN Card Number' => 'number', 'PAN Card', 'Address Proof - Light bill', 'Cancel Cheque', 'Bank Statement - Last 6 months', 'Form 16', 'Salary Slip'] as $label => $type)
                            @php
                                $title = is_int($label) ? $type : $label;
                                $isInput = is_string($type) && $type === 'number';
                                $fieldName = strtolower(str_replace([' ', '-'], '_', $title));
                            @endphp
                            <div class="col-md-6 col-xl-4">
                                <div class="card h-100 border-top border-dark shadow-sm">
                                    <div class="card-body">
                                        <h6 class="fw-bold">{{ $title }}</h6>
                                        @if ($isInput)
                                            <input type="text" name="{{ $fieldName }}" class="form-control mt-2"
                                                placeholder="{{ $title }}">
                                        @else
                                            <div class="input-group mt-2">
                                                <input type="file" name="{{ $fieldName }}" class="form-control">
                                                <button class="btn btn-outline-danger upload-btn" type="button"
                                                    data-field="{{ $fieldName }}">UPLOAD</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-12">
                            <div class="card h-100 border-top border-dark shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold">Remark</h6>
                                    <textarea name="remark" class="form-control mt-2" rows="5" placeholder="Add any remark..."></textarea>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Submit All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kycForm = document.getElementById('kycForm');
            const uploadButtons = document.querySelectorAll('.upload-btn');

            uploadButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const field = this.dataset.field;
                    const inputs = kycForm.querySelectorAll('input, textarea');

                    inputs.forEach(input => {
                        if (
                            input.name !== field &&
                            input.name !== '_token' &&
                            input.type !== 'hidden'
                        ) {
                            input.disabled = true;
                        }
                    });

                    kycForm.submit();
                });
            });
        });
    </script>
@endpush
