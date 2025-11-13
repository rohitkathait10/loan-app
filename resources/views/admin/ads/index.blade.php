@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">ADVERTISEMENT</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">ADVERTISEMENT</li>
            </ul>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <h4 class="card-title col-md-6">All Advertisement</h4>
                        <div class="col-md-6 text-end py-2 py-md-0">
                            <a href="{{ route('admin.ads.add') }}" class="btn btn-primary btn-round me-2"
                                id="downloadGoldCardBtn">Add Advertisement</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="advertisement-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Title</th>
                                        <th>Content Status</th>
                                        <th>Image Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $index => $ad)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $ad->title }}</td>

                                            <td>
                                                @if ($ad->content_status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($ad->image_status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>{{ $ad->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.ads.view', $ad->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('admin.ads.edit', $ad->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('admin.ads.delete', $ad->id) }}" method="POST"
                                                    class="delete-form d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-sm btn-danger btn-delete">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content Status</th>
                                        <th>Image Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
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
            $('#advertisement-datatables').DataTable({
                pageLength: 10,
                responsive: true,
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            visible: true,
                            className: "btn btn-danger"
                        },
                        confirm: {
                            text: "Yes, delete it!",
                            className: "btn btn-success"
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
