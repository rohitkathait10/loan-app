@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">DASHBOARD</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">DASHBOARD</li>
            </ul>
        </div>

        <div class="row">
            @php
                $cards = [
                    ['title' => 'Total Leads', 'count' => $customer, 'icon' => 'fas fa-user'],
                    ['title' => 'Total Customers', 'count' => $user, 'icon' => 'fas fa-briefcase'],
                    ['title' => 'Total Active Loans', 'count' => 0, 'icon' => 'fas fa-briefcase'],
                    ['title' => 'New Applications Today/This Week', 'count' => 0, 'icon' => 'fas fa-briefcase'],
                    ['title' => 'Overdue Loans Count', 'count' => 0, 'icon' => 'fas fa-briefcase'],
                    ['title' => 'Total Amount Disbursed / Collected', 'count' => 0, 'icon' => 'fas fa-briefcase'],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="{{ $card['icon'] }}"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">{{ $card['title'] }}</p>
                                        <h4 class="card-title">{{ $card['count'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card card-round">
                </div>
            </div>
        </div>

    </div>
@endsection
