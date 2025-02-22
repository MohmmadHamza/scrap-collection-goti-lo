@extends('admin.main-template.main-template')

@section('content')
    <style>
        .rounded-circle {
            border-radius: 50%;
            /* Ensures the image is round */
            overflow: hidden;
            /* Hides any overflow to maintain the round shape */
        }
    </style>
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="row mb-6">


                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <h5 class="card-header">Users Create</h5>
                        <div class="card-body">
                            <form class="needs-validation" novalidate method="POST"
                                action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($user))
                                    @method('PUT') <!-- This will tell Laravel to use the PUT method for updates -->
                                @endif

                                <div class="row mb-6">
                                    <div class="col-md-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="name"
                                            placeholder="Enter your username" value="{{ old('name', $user->name ?? '') }}"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your username.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="john.doe@example.com"
                                            value="{{ old('email', $user->email ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="********" {{ isset($user) ? '' : 'required' }} />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your password.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <input type="password" id="confirm-password" name="password_confirmation"
                                            class="form-control" placeholder="********"
                                            {{ isset($user) ? '' : 'required' }} />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please confirm your password.</div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <div class="col-md-3">
                                        <label class="form-label" for="role">Role</label>
                                        <select class="form-select" id="role" name="role_id" required>
                                            <option value="">- Select Role -</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ isset($user) && $user->role_id == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select your role.</div>
                                    </div>



                                    <div class="col-md-3">
                                        <label class="form-label">Gender</label>
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="form-check me-3">
                                                <input type="radio" id="gender-male" name="gender"
                                                    class="form-check-input" required value="male"
                                                    {{ isset($user) && $user->gender === 'male' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="gender-male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="gender-female" name="gender"
                                                    class="form-check-input" required value="female"
                                                    {{ isset($user) && $user->gender === 'female' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="gender-female">Female</label>
                                            </div>
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select your gender.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="state">State</label>
                                        <select class="form-select" id="state" name="state_id" required>
                                            <option value="">- Select State -</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ isset($user) && $state->id == $user->state_id ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select your state.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="city">City</label>
                                        <select class="form-select" id="city" name="city_id" required>
                                            <option value="">- Select City -</option>
                                            @if (isset($cities))
                                                // Only show cities if editing
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ isset($user) && $city->id == $user->city_id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select your city.</div>
                                    </div>




                                </div>

                                <div class="row mb-6">
                                    <div class="col-md-4">
                                        <label class="form-label" for="bs-validation-dob">DOB</label>
                                        <input type="text"
                                            class="form-control flatpickr-validation flatpickr-input"
                                            id="bs-validation-dob" name="dob" placeholder="YYYY/MM/DD"
                                            value="{{ old('dob', $user->dob ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your DOB.</div>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label" for="profile-picture">Profile Picture</label>


                                        <input type="file" class="form-control" id="profile-picture"
                                            name="profile_picture" {{ isset($user) ? '' : 'required' }} />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please upload a profile picture.</div>


                                    </div>


									 <!-- Display existing profile picture if editing -->
									 @if (isset($user) && $user->profile_picture)
                                    <div class="col-md-2">
                                       
                                            <div class="mb-2">
                                                <img src="{{ asset('assets/' . $user->profile_picture) }}"
                                                    alt="Profile Picture" class="rounded-circle"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </div>
                                      
                                    </div>
									@endif

                                    <div class="col-md-2 mt-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="statusToggle"
                                                name="status" value="active" 
                                                {{ isset($user) && $user->status === 'active' ? 'checked' : '' }} /> <!-- Check for 'active' -->
                                            <label class="form-check-label" for="statusToggle">Active Status</label>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($user) ? 'update' : 'add' }}">
                                        {{ isset($user) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- /Bootstrap Validation -->
            </div>


        </div>
        <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                flatpickr("#bs-validation-dob", {
                    dateFormat: "Y/m/d",
                    maxDate: "today",
                });
            });
        </script>
        
        <!-- Page JS -->
        <script>
              (function () {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
        
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            } else {
                                // Disable the submit button to prevent multiple clicks
                                var submitButton = form.querySelector('button[type="submit"]');
                                submitButton.disabled = true; // Disable the button
                                submitButton.textContent = 'Submitting...'; // Change button text
                            }
        
                            form.classList.add('was-validated')
                        }, false)
                    })
            })()



            $(document).ready(function() {
                // Check if state is already selected and load cities accordingly
                var selectedStateId = $('#state').val();

                // Load cities only if user is editing
                @if (isset($user))
                    if (selectedStateId) {
                        loadCities(selectedStateId, {{ $user->city_id }});
                    }
                @endif

                $('#state').change(function() {
                    var stateId = $(this).val();
                    loadCities(stateId);
                });
            });

            function loadCities(stateId, selectedCityId = null) {
                if (stateId) {
                    $.ajax({
                        url: '/get-cities/' + stateId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">- Select City -</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '" ' + (value.id ==
                                        selectedCityId ? 'selected' : '') + '>' + value.name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty();
                    $('#city').append('<option value="">- Select City -</option>');
                }
            }
        </script>
        <!-- / Content -->
    @endsection
