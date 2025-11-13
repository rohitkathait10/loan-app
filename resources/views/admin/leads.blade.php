@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">LEADS</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">LEADS</li>
            </ul>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Loan History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S no.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Salary Type</th>
                                        <th>Cibil Score</th>
                                        <th>Salary</th>
                                        <th>Loan Purpose</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leads as $lead)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lead->name }}</td>
                                            <td>{{ $lead->phone }}</td>
                                            <td>{{ $lead->email }}</td>
                                            <td>{{ $lead->salary_type }}</td>
                                            <td>{{ $lead->cibil_score }}</td>
                                            <td>{{ $lead->monthly_income }}</td>
                                            <td>{{ $lead->loan_purpose }}</td>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-primary btn-sm view-customer-btn"
                                                    data-id="{{ $lead->id }}">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S no.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Salary Type</th>
                                        <th>Cibil Score</th>
                                        <th>Salary</th>
                                        <th>Loan Purpose</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewCustomerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lead Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="customer-details-content">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        className: 'btn btn-outline-primary btn-sm me-2'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-outline-success btn-sm me-2'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export PDF',
                        className: 'btn btn-outline-danger btn-sm'
                    }
                ],
                pageLength: 10,
                order: [
                    [1, 'desc']
                ],
                responsive: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.view-customer-btn').on('click', function() {
                var userId = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.leads.show', ':id') }}".replace(':id', userId),
                    type: 'GET',
                    success: function(res) {
                        $('#customer-details-content').html(res);
                        $('#viewCustomerModal').modal('show');
                    },
                    error: function() {
                        alert('Failed to fetch customer details');
                    }
                });
            });
        });
    </script>
@endpush
