@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">MY PROFILE</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">MY PROFILE</li>
            </ul>
        </div>

        <div class="row mt-4">
            <!-- Profile Details -->
            <div class="col-md-6">
                <div class="card card-round">
                    <div class="card-body">
                        <h4 class="mb-3">Profile Details</h4>
                        <p><strong>Registered On - </strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                        <p><strong>Mobile No - </strong> {{ auth()->user()->phone ?? 'N/A' }}</p>

                        <form action="{{ route('user.profile.update') }}" method="POST">
                            @csrf

                            <div class="mb-3 d-flex align-items-center">
                                <label for="name" class="me-3" style="width: 120px;">Name</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                    class="form-control">
                            </div>

                            <div class="mb-3 d-flex align-items-center">
                                <label for="email" class="me-3" style="width: 120px;">Email ID</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                    class="form-control">
                            </div>

                            <div class="mb-3 d-flex align-items-center">
                                <label for="state" class="me-3" style="width: 120px;">State</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ auth()->user()->state_id == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 d-flex align-items-center">
                                <label for="city" class="me-3" style="width: 120px;">City</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="mb-3 d-flex align-items-center">
                                <label for="address" class="me-3" style="width: 120px;">Address</label>
                                <input type="text" name="address" value="{{ auth()->user()->address }}"
                                    class="form-control">
                            </div>

                            <div class="mb-3 d-flex align-items-center">
                                <label for="pincode" class="me-3" style="width: 120px;">Pincode</label>
                                <input type="text" name="pincode" value="{{ auth()->user()->pincode }}"
                                    class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Change</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password Accordion -->
            <div class="col-md-6">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="accordion" id="passwordAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Change Password
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#passwordAccordion">
                                    <div class="accordion-body">
                                        <form action="{{ route('user.change-password') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-2 position-relative">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" name="current_password" id="current_password" class="form-control" required>
                                                <span class="toggle-pass" data-target="current_password">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                            
                                            <div class="form-group mb-2 position-relative">
                                                <label for="new_password">New Password</label>
                                                <input type="password" name="password" id="new_password" class="form-control" required>
                                                <span class="toggle-pass" data-target="new_password">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                            
                                            <div class="form-group mb-3 position-relative">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                                <span class="toggle-pass" data-target="password_confirmation">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        const selectedState = "{{ auth()->user()->state_id }}";
        const selectedCity = "{{ auth()->user()->city_id }}";

        function loadCities(state_id, selected = null) {
            let url = "{{ route('get.cities', ':id') }}".replace(':id', state_id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#city').empty().append('<option value="">Select City</option>');
                    $.each(data, function(key, city) {
                        let isSelected = selected == city.id ? 'selected' : '';
                        $('#city').append('<option value="' + city.id + '" ' + isSelected + '>' + city
                            .city + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {
            if (selectedState) {
                loadCities(selectedState, selectedCity);
            }

            $('#state').on('change', function() {
                var state_id = $(this).val();
                if (state_id) {
                    loadCities(state_id);
                } else {
                    $('#city').empty().append('<option value="">Select City</option>');
                }
            });
        });
    </script>
    
<script>
   

    $(document).on('click', '.toggle-pass', function() {
        let inputId = $(this).data('target');
        let input = $('#' + inputId);
        let icon = $(this).find('i');

        if (input.attr('type') === "password") {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
</script>

@endpush
