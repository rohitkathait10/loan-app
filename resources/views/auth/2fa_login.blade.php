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

                            <h2 class="text-center fw-bold mb-4" style="font-size: 1.8rem;">Admin Login Account</h2>

                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            <form method="POST" action="{{ route('admin.2fa.check') }}">
                                @csrf
                                <h3>Enter Google Authenticator Code</h3>

                                <input type="text" name="otp" class="form-control" required placeholder="123456">

                                @error('otp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="btn btn-primary mt-3">Verify</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
