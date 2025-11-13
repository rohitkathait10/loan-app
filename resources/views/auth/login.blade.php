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

                            <h2 class="text-center fw-bold mb-4" style="font-size: 1.8rem;">Customer Login Account</h2>

                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" required
                                        placeholder="Enter your mobile number">

                                    @error('phone')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative">
                                    <label class="form-label">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        placeholder="Enter your password">

                                    <span class="position-absolute" onclick="togglePassword()"
                                        style="top: 70%; right: 12px; cursor: pointer; transform: translateY(-50%); color:#D62E4C;">
                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                    </span>

                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>

                                <div class="mb-3 text-end">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    @endif
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn customer-login-btn text-white">Login</button>
                                </div>
                            </form>

                            <hr class="my-4">

                            <div class="text-center mt-4">
                                Don't have an account?
                                <a href="https://kredifyloans.com/personal" class="text-apply">Apply Now</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (session('swal'))
        <script>
            Swal.fire({
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                icon: '{{ session('swal.icon') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');

            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endpush

