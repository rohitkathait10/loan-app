@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">SUPPORT</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">SUPPORT</li>
            </ul>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Support History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="support-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S no.</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Query</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supports as $support)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $support->user->name ?? 'N/A' }}</td>
                                            <td>{{ $support->user->phone ?? 'N/A' }}</td>
                                            <td>{{ $support->subject }}</td>
                                            <td>{{ $support->query }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S no.</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Query</th>
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
            $('#support-datatables').DataTable({
                pageLength: 10,
                responsive: true,
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>
@endpush
