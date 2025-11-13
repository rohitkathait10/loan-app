@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">CUSTOMERS</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator"><i class="fas fa-chevron-right"></i></li>
                <li class="nav-item">CUSTOMERS</li>
                <li class="separator"><i class="fas fa-chevron-right"></i></li>
                <li class="nav-item">CUSTOMER DOCUMENTS</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills nav-secondary">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers/show/' . $user->id) ? 'active' : '' }}"
                                    href="{{ url('/admin/customers/show/' . $user->id) }}">Customer Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers/documents/' . $user->id) ? 'active' : '' }}"
                                    href="{{ url('/admin/customers/documents/' . $user->id) }}">Customer Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers/loanHistory/' . $user->id) ? 'active' : '' }}"
                                    href="{{ url('/admin/customers/loanHistory/' . $user->id) }}">Customer Loan History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers/supportLog/' . $user->id) ? 'active' : '' }}"
                                    href="{{ url('/admin/customers/supportLog/' . $user->id) }}">Customer Support Log</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        @php
                            $docPath = 'storage/';
                        @endphp

                        @if (!empty($documents))
                            <table class="table align-items-center table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Profile Photo</th>
                                        <td>
                                            @if ($documents->profile_photo)
                                                <img src="{{ asset($docPath . $documents->profile_photo) }}"
                                                    alt="Profile Photo" width="100" height="100"
                                                    class="img-thumbnail view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->profile_photo) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aadhar Number</th>
                                        <td>{{ $documents->aadhar_number }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aadhar Card</th>
                                        <td>
                                            @if ($documents->aadhar_card)
                                                <img src="{{ asset($docPath . $documents->aadhar_card) }}"
                                                    alt="Aadhar Card" width="100" height="100"
                                                    class="img-thumbnail view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->aadhar_card) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">PAN Number</th>
                                        <td>{{ $documents->pan_number }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">PAN Card</th>
                                        <td>
                                            @if ($documents->pan_card)
                                                <img src="{{ asset($docPath . $documents->pan_card) }}" alt="PAN Card"
                                                    width="100" height="100" class="img-thumbnail view-image"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->pan_card) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Address Proof</th>
                                        <td>
                                            @if ($documents->address_proof)
                                                <img src="{{ asset($docPath . $documents->address_proof) }}"
                                                    alt="Address Proof" width="100" height="100"
                                                    class="img-thumbnail view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->address_proof) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Cancelled Cheque</th>
                                        <td>
                                            @if ($documents->cancel_cheque)
                                                <img src="{{ asset($docPath . $documents->cancel_cheque) }}"
                                                    alt="Cancelled Cheque" width="100" height="100"
                                                    class="img-thumbnail view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->cancel_cheque) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Bank Statement</th>
                                        <td>
                                            @if ($documents->bank_statement)
                                                <img src="{{ asset($docPath . $documents->bank_statement) }}"
                                                    alt="Bank Statement" width="100" height="100"
                                                    class="img-thumbnail view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->bank_statement) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Form 16</th>
                                        <td>
                                            @if ($documents->form_16)
                                                <img src="{{ asset($docPath . $documents->form_16) }}" alt="Form 16"
                                                    width="100" height="100" class="img-thumbnail view-image"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->form_16) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Salary Slip</th>
                                        <td>
                                            @if ($documents->salary_slip)
                                                <img src="{{ asset($docPath . $documents->salary_slip) }}"
                                                    alt="Salary Slip" width="100" height="100"
                                                    class="img-thumbnail view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-img="{{ asset($docPath . $documents->salary_slip) }}">
                                            @else
                                                <span class="text-muted">Not uploaded</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Remark</th>
                                        <td>{{ $documents->remark ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Document Uploaded On</th>
                                        <td>{{ $documents->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Last Updated On</th>
                                        <td>{{ $documents->updated_at->format('d M Y, h:i A') }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning">No documents uploaded.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Profile Image</h5>
                    <button type="button" class="close" id="closeModalBtn" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.view-image').forEach(function(img) {
            img.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-img');
                $('#modalImage').attr('src', imageUrl);
                $('#imageModal').modal('show');
            });
        });

        $('#closeModalBtn').click(function() {
            $('#imageModal').modal('hide');
        });
    </script>
@endpush
