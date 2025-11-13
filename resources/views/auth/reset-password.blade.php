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

                            <h2 class="text-center fw-bold mb-4" style="font-size: 1.8rem;">Reset Password</h2>

                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <div class="mb-3 position-relative">
                                    <label class="form-label">New Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required>

                                    <span class="position-absolute" onclick="togglePassword('password','eyeIcon1')"
                                        style="top: 70%; right: 12px; cursor: pointer; transform: translateY(-50%); color:#D62E4C;">
                                        <i id="eyeIcon1" class="fa fa-eye"></i>
                                    </span>

                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" required>

                                    <span class="position-absolute"
                                        onclick="togglePassword('password_confirmation','eyeIcon2')"
                                        style="top: 70%; right: 12px; cursor: pointer; transform: translateY(-50%); color:#D62E4C;">
                                        <i id="eyeIcon2" class="fa fa-eye"></i>
                                    </span>

                                    @error('password_confirmation')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn customer-login-btn text-white">Reset Password</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endpush
