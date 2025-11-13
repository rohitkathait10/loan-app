@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">DIGITAL BUSINESS LOAN APPLICATION</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">DIGITAL BUSINESS LOAN APPLICATION</li>
            </ul>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 mb-4">
                <div class="card card-round h-100">
                    <div class="card-body">
                        <form action="{{ route('user.apply.personal.loan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="business" name="loan_type">
                            <div class="row">

                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="fw-bold" for="amount">Loan Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount"
                                            placeholder="Enter loan amount" />
                                    </div>

                                    <div class="form-group">
                                        <label class="fw-bold" for="purpose">Loan Purpose</label>
                                        <select name="purpose" id="purpose" class="form-control">
                                            <option value="">Select Loan Purpose</option>
                                            <option value="Medical Emergency">Medical Emergency</option>
                                            <option value="Home Renovation">Home Renovation</option>
                                            <option value="Marriage Purpose">Marriage Purpose</option>
                                            <option value="Personal Use">Personal Use</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="fw-bold" for="emi">Monthly EMI You are Already Paying</label>
                                        <input type="text" class="form-control" id="emi" name="emi"
                                            placeholder="Enter current EMI amount" />
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="fw-bold" for="cibil">CIBIL Score</label>
                                        <select name="cibil" id="cibil" class="form-control">
                                            <option value="">Select CIBIL score</option>
                                            <option value="650-700">650-700</option>
                                            <option value="700-750">700-750</option>
                                            <option value="750-800">750-800</option>
                                            <option value="800-850">800-850</option>
                                            <option value="850-900">850-900</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="fw-bold" for="monthly_income">Monthly Income</label>
                                        <input type="text" class="form-control" id="monthly_income" name="monthly_income"
                                            placeholder="Enter monthly income" />
                                    </div>

                                    <div class="form-group">
                                        <label class="fw-bold" for="emi_bounce">Last 6 Months Any EMI Bounce?</label>
                                        <select name="emi_bounce" id="emi_bounce" class="form-control">
                                            <option value="No" selected>No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">CHECK ELIGIBILITY NOW</button>
                            </div>

                            <p class="text-center mt-3 text-muted small">
                                By submitting the form & proceeding, you agree to the
                                <a href="https://kredifyloans.com/Terms" class="text-primary">Terms of Use</a> and
                                <a href="https://kredifyloans.com/privacypolicy" class="text-primary">Privacy Policy</a> of
                                kredifyloans.com
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
