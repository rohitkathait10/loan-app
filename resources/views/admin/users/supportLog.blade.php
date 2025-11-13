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
                <li class="nav-item">CUSTOMER SUPPORT LOG</li>
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
                        <table class="table align-items-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Query</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportLog as $support)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $support->user->phone ?? 'N/A' }}</td>
                                        <td>{{ $support->subject }}</td>
                                        <td>{{ $support->query }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
