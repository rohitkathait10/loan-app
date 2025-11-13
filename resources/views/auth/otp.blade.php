@extends('layouts.guest')

@section('content')
    <div class="customer-login-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg customer-login-card">
                        <div class="card-body px-5 py-4">

                            <div class="d-flex justify-content-center mb-3">
                                <img src="{{ asset('admin/assets/img/logo-new.png') }}" alt="Logo" class="login-img-fluid">
                            </div>

                            <h2 class="text-center fw-bold mb-4" style="font-size: 1.8rem;">Verify OTP</h2>

                            <p class="text-center text-muted mb-4">
                                We have sent an OTP to your registered mobile number<br>
                                <strong>{{ Session::get('reset_phone') }}</strong>
                            </p>

                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            <form method="POST" action="{{ route('password.verifyOtp.post') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Enter OTP</label>
                                    <input type="text" name="otp"
                                        class="form-control @error('otp') is-invalid @enderror" required
                                        placeholder="4-digit OTP">

                                    @error('otp')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn customer-login-btn text-white">Verify OTP</button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                Didn't receive OTP?
                                <a href="{{ route('password.mobile.resend') }}" class="text-apply fw-bold">Resend OTP</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
