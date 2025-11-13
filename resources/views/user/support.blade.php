@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">SUPPORT</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">SUPPORT</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="fw-bold">Kredifyloans Corporate Services Pvt. Ltd.</h4>
                        <ul class="list-unstyled mt-4">
                            <li>
                                <i class="fas fa-certificate text-primary me-2"></i>
                                GST No.: <strong>23AZAPB9160F1ZU</strong>
                            </li>
                            <hr>
                            <li class="mt-2">
                                <i class="fas fa-phone-alt text-success me-2"></i>
                                +91-9428686960
                            </li>
                            <hr>
                            <li class="mt-2">
                                <i class="fas fa-envelope text-danger me-2"></i>
                                info@kredifyloans.com
                            </li>
                            <hr>
                            <li class="mt-2">
                                <i class="far fa-clock text-warning me-2"></i>
                                10.30 AM to 6.30 PM (Monday to Saturday)
                            </li>
                            <hr>
                            <li class="mt-2">
                                <i class="fas fa-map-marker-alt text-info me-2"></i>
                                Flat No 153, SANJAY NAGAR, Dewas, Madhya Pradesh - 455001
                            </li>
                        </ul>

                        <p class="text-muted mt-3 small">
                            Our customer service experts are here for you. Lines are open Mon–Sat from 10:30 am – 6:30 pm.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.support') }}">
                            @csrf
                            <div class="form-group">
                                <label for="subject" class="fw-semibold">Subject *</label>
                                <select name="subject" id="subject" class="form-control" required>
                                    <option value="">-</option>
                                    <option value="Issue with Membership card">Issue with Membership card</option>
                                    <option value="Change Registered Emial id or Mobile Number">Change Registered Emial id
                                        or Mobile Number</option>
                                    <option value="Personal Loan">Personal Loan</option>
                                    <option value="Business Loan">Business Loan</option>
                                    <option value="Referral Withdrawal">Referral Withdrawal</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="query" class="fw-semibold">Query *</label>
                                <textarea name="query" id="query" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
