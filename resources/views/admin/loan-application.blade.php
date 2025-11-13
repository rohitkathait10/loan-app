@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">LOAN APPLICATIONS</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator"><i class="fas fa-chevron-right"></i></li>
                <li class="nav-item">LOAN APPLICATIONS</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Loan Type</th>
                                        <th>Amount</th>
                                        <th>CIBIL Score</th>
                                        <th>Loan Purpose</th>
                                        <th>Tenure</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loanData as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                 <a href="{{ route('admin.users.show', $data->user->id) }}">
                                                    {{ $data->user->name }}
                                                </a>
                                            </td>
                                            <td>{{ $data->created_at->format('d M, Y') }}</td>
                                            <td>{{ ucfirst($data->loan_type) }}</td>
                                            <td>₹{{ number_format($data->amount, 2) }}</td>
                                            <td>{{ $data->cibil }}</td>
                                            <td>{{ $data->purpose }}</td>
                                            <td>{{ $data->tenure_months ?? 'N/A' }}</td>
                                            <td>{{ $data->remark ?? 'N/A' }}</td>
                                            <td>
                                                @php
                                                    $status = $data->status ?? 'N/A';
                                                    $statusClass = match (strtolower($status)) {
                                                        'pending' => 'badge bg-warning text-dark',
                                                        'success' => 'badge bg-success',
                                                        'failed' => 'badge bg-danger',
                                                        default => 'badge bg-secondary',
                                                    };
                                                @endphp

                                                <span class="{{ $statusClass }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.loan-applications.edit', $data->id) }}">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Loan Type</th>
                                        <th>Amount</th>
                                        <th>CIBIL Score</th>
                                        <th>Loan Purpose</th>
                                        <th>Tenure</th>
                                        <th>Remark</th>
                                        <th>Status</th>
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
@endpush
