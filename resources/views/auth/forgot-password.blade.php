@extends('layouts.guest')

@section('content')
<div class="loan-backcolor d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body px-5 py-4">

                        {{-- Logo --}}
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-height: 60px;">
                        </div>

                        {{-- Heading --}}
                        <h2 class="text-center fw-bold mb-3">Forgot Your Password?</h2>

                        <p class="text-muted text-start mb-4">
                            No problem. Enter your mobile number and we’ll send you a link to reset your password.
                        </p>

                        {{-- Session Status --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                       {{-- <form method="POST" action="{{ route('password.sms') }}"> --}}
    @csrf

    <div class="mb-3">
        <label for="phone" class="form-label">Mobile Number</label>
        <input type="text"
            class="form-control form-control-lg rounded-3 @error('phone') is-invalid @enderror"
            id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Enter your mobile number">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary py-2 fs-5 rounded-3">
            Send Reset OTP
        </button>
    </div>
</form>


                        <hr class="my-4 border-dark">

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none text-dark fw-semibold">Back to Login</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
