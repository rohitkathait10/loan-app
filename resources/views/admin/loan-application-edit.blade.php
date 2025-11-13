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
                <li class="separator"><i class="fas fa-chevron-right"></i></li>
                <li class="nav-item">Edit</li>
            </ul>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.loan-applications.update', $loanData->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Name</strong></label>
                                        <input type="text" class="form-control" value="{{ $loanData->user->name }}"
                                            readonly>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Date</strong></label>
                                        <input type="text" class="form-control"
                                            value="{{ $loanData->created_at->format('d M, Y') }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Tenure (Months)</strong></label>
                                        <input type="text" class="form-control" name="tenure_months" value="{{ $loanData->tenure_months }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Remark</strong></label>
                                        <input type="text" name="remark" class="form-control"
                                            value="{{ old('remark', $loanData->remark) }}">
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Status</strong></label>
                                        <select name="status" class="form-control">
                                            <option value="pending" {{ $loanData->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="success" {{ $loanData->status == 'success' ? 'selected' : '' }}>
                                                Success</option>
                                            <option value="failed" {{ $loanData->status == 'failed' ? 'selected' : '' }}>
                                                Failed</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Update Application</button>
                                        <a href="{{ route('admin.loan-applications') }}" class="btn btn-info">Back</a>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Loan Type</strong></label>
                                        <input type="text" class="form-control" value="{{ $loanData->loan_type }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Amount</strong></label>
                                        <input type="text" class="form-control" value="{{ $loanData->amount }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>CIBIL Score</strong></label>
                                        <input type="text" class="form-control" value="{{ $loanData->cibil }}" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label><strong>Loan Purpose</strong></label>
                                        <input type="text" class="form-control" value="{{ $loanData->purpose }}"
                                            readonly>
                                    </div>


                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
