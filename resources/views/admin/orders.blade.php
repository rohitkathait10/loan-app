@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">ORDERS</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">ORDERS</li>
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
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Utr</th>
                                        <th>Payment Screenshot</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->amount }}</td>
                                            <td>{{ $order->utr }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $order->payment_screenshot) }}"
                                                    alt="payment_screenshot" width="120">
                                            </td>

                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-sm view-order-btn"
                                                    data-id="{{ $order->id }}">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S no.</th>
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Utr</th>
                                        <th>Payment Screenshot</th>
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

    <div class="modal fade" id="viewOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="order-details-content">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img id="full-image" class="w-100" alt="payment">
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
            $('.view-order-btn').on('click', function() {
                var userId = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.orders.show', ':id') }}".replace(':id', userId),
                    type: 'GET',
                    success: function(res) {
                        $('#order-details-content').html(res);
                        $('#viewOrderModal').modal('show');
                    },
                    error: function() {
                        alert('Failed to fetch orders details');
                    }
                });
            });
        });

        $(document).on('click', '.open-image', function() {
            var img = $(this).data('img');
            $('#full-image').attr('src', img);
            $('#imageModal').modal('show');
        });
    </script>
@endpush
