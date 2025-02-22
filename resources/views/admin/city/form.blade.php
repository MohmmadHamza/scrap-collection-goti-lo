@extends('admin.main-template.main-template')

@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row mb-6">

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <h5 class="card-header">City Create</h5>
                        <div class="card-body">
                            <!-- Display Error Messages -->
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Display Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="needs-validation" novalidate method="POST"
                                action="{{ isset($city) ? route('city.update', $city->id) : route('city.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($city))
                                    @method('PUT')
                                @endif

                                <div class="row mb-6">
                                    <!-- Country Field -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="country_id">Country</label>
                                        <select class="form-control js-example-basic-single"
                                            id="country_id" name="country_id" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countrys as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ (old('country_id') ?? ($city->country_id ?? 76)) == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a country.</div>
                                        @error('country_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- State Field -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="state_id">State</label>
                                        <select class="form-control @error('state_id') is-invalid @enderror" id="state_id"
                                            name="state_id" required>
                                            <option value="">Select State</option>
                                            @if (isset($states))
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ (old('state_id') ?? ($city->state_id ?? '')) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a state.</div>
                                      
                                    </div>

                                    <!-- Other Fields -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="name">City Name</label>
                                        <input type="text" class="form-control"
                                            id="name" name="name" placeholder="Enter City Name"
                                            value="{{ old('name', $city->name ?? '') }}" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Name.</div>
                                       
                                    </div>

                                </div>

                                <div class="row mb-6">

                                    <!-- Other Fields -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="latitude">Latitude</label>
                                        <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                            id="latitude" name="latitude" placeholder="Enter Latitude"
                                            value="{{ old('latitude', $city->latitude ?? '') }}" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter latitude.</div>
                                      
                                    </div>
                                    <!-- Longitude Field -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="longitude">Longitude</label>
                                        <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                            id="longitude" name="longitude" placeholder="Enter Longitude"
                                            value="{{ old('longitude', $city->longitude ?? '') }}" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter longitude.</div>
                                       
                                    </div>

                                    <!-- Active Status -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="statusToggle">Active Status</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="statusToggle" name="status"
                                                value="active"
                                                {{ (old('status') ?? ($city->status ?? '')) === 'active' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusToggle">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($city) ? 'update' : 'add' }}">
                                        {{ isset($city) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('city.index') }}" class="btn btn-outline-danger">Cancel</a>
                                </div>
                                

                              
                                
                            </form>


                        </div>
                    </div>
                </div>
                <!-- /Bootstrap Validation -->
            </div>
        </div>

        
        <script>
                $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
            // JavaScript form validation
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
                function fetchStates(countryId, selectedStateId = null) {
                    $.ajax({
                        url: "{{ route('get.states') }}", // Your route to fetch states
                        type: "GET",
                        data: {
                            country_id: countryId
                        },
                        success: function(states) {
                            var stateDropdown = $('#state_id');
                            stateDropdown.empty(); // Clear existing options
                            stateDropdown.append('<option value="">Select State</option>');

                            $.each(states, function(key, state) {
                                var isSelected = state.id == selectedStateId ? 'selected' : '';
                                stateDropdown.append('<option value="' + state.id + '" ' +
                                    isSelected + '>' +
                                    state.name + '</option>');
                            });
                        },
                        error: function() {
                            console.error('Error fetching states.');
                        }
                    });
                }

                $('#country_id').change(function() {
                    var countryId = $(this).val();
                    fetchStates(countryId);
                });

                // Trigger the change event if a country is already selected (for edit mode)
                var selectedCountryId = $('#country_id').val();
                var selectedStateId = "{{ $city->state_id ?? '' }}"; // Set the selected state for edit
                if (selectedCountryId) {
                    fetchStates(selectedCountryId, selectedStateId); // Fetch states and pre-select the state
                }
            });
        </script>
    </div>
    <!-- / Content -->
@endsection
