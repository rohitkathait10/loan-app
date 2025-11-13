@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">Agents</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">Agents</li>
            </ul>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-6">
                             <h4 class="card-title">All Agents</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route(admin.agent.store) }}" class="btn btn-primary">Add Agent</a>
                        </div>
                       
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
                                    @foreach ($agents as $agent)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $agent->name }}</td>
                                            <td>{{ $agent->phone }}</td>
                                            <td>{{ $agent->email }}</td>
                                            <td>{{ $agent->salary_type }}</td>
                                            <td>{{ $agent->cibil_score }}</td>
                                            <td>{{ $agent->monthly_income }}</td>
                                            <td>{{ $agent->loan_purpose }}</td>
                                            
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
