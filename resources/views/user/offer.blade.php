@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">APPLY NOW</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">APPLY NOW</li>
            </ul>
        </div>

        <div class="row mt-5">
            <div class="col-12 mb-4">
                <h3 class="text-center">Most Selling Online Products We Offer</h3>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card card-round text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-desktop fa-3x mb-3"></i>
                        <h4 class="card-title">Digital Personal Loan</h4>
                        @if(auth()->user()->loan_type == 'personal')
                        <a href="{{ route('user.apply.personal.loan') }}" class="btn btn-primary mt-3">
                            Apply Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @else
                         <a href="https://kredifyloans.com/personal" class="btn btn-primary mt-3">
                            Apply Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card card-round text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-coins fa-3x mb-3"></i>
                        <h4 class="card-title">Digital Business Loan</h4>
                        @if(auth()->user()->loan_type == 'business')
                        <a href="{{ route('user.apply.business.loan') }}" class="btn btn-primary mt-3">
                            Apply Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @else
                          <a href="https://kredifyloans.com/business" class="btn btn-primary mt-3">
                            Apply Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
