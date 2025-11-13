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
                <li class="nav-item">CUSTOMER DETAILS</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills nav-secondary">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers/show/' . $user->id) ? 'active' : '' }}"
                                    href="{{ url('/admin/customers/show/' . $user->id) }}">Customer Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/customers/documents/' . $user->id) ? 'active' : '' }}"
                                    href="{{ url('/admin/customers/documents/' . $user->id) }}">Customer Documents
                                </a>
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
                            <tbody>
                                <tr>
                                    <th scope="row">ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">City</th>
                                    <td>{{ $user->city->city }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">State</th>
                                    <td>{{ $user->state->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Salary Type</th>
                                    <td>{{ $user->salary_type }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Cibil Score</th>
                                    <td>{{ $user->cibil_score }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Monthly Income</th>
                                    <td>{{ $user->monthly_income }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Loan Purpose</th>
                                    <td>{{ $user->loan_purpose }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Operating System</th>
                                    <td>{{ $user->os }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Browser</th>
                                    <td>{{ $user->browser }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Device Type</th>
                                    <td>{{ $user->device_type }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
