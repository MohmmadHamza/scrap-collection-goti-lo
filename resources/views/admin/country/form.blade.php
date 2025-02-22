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
                        <h5 class="card-header">Country Create</h5>
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
                                action="{{ isset($country) ? route('country.update', $country->id) : route('country.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($country))
                                    @method('PUT')
                                @endif

                                <div class="row mb-6">


                                    <div class="col-md-4">
                                        <label class="form-label" for="name">Country Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter Country Name"
                                            value="{{ old('name', $country->name ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the country name.</div>
                                       
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="iso_alpha_3">ISO Alpha-3 Code</label>
                                        <input type="text"
                                            class="form-control @error('iso_alpha_3') is-invalid @enderror" id="iso_alpha_3"
                                            name="iso_alpha_3" placeholder="Enter ISO Alpha-3 Code"
                                            value="{{ old('iso_alpha_3', $country->iso_alpha_3 ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the ISO Alpha-3 code.</div>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="numeric_code">Numeric Code</label>
                                        <input type="number"
                                            class="form-control @error('numeric_code') is-invalid @enderror"
                                            id="numeric_code" name="numeric_code" placeholder="Enter Numeric Code"
                                            value="{{ old('numeric_code', $country->numeric_code ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the numeric code.</div>
                                      
                                    </div>
                                </div>

                                <div class="row mb-6">


                                    <div class="col-md-4">
                                        <label class="form-label" for="currency_code">Currency Code</label>
                                        <input type="text"
                                            class="form-control @error('currency_code') is-invalid @enderror"
                                            id="currency_code" name="currency_code" placeholder="Enter Currency Code"
                                            value="{{ old('currency_code', $country->currency_code ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the currency code.</div>
                                     
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="currency_name">Currency Name</label>
                                        <input type="text"
                                            class="form-control @error('currency_name') is-invalid @enderror"
                                            id="currency_name" name="currency_name" placeholder="Enter Currency Name"
                                            value="{{ old('currency_name', $country->currency_name ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the currency name.</div>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="phone_code">Phone Code</label>
                                        <input type="text" class="form-control @error('phone_code') is-invalid @enderror"
                                            id="phone_code" name="phone_code" placeholder="Enter Phone Code"
                                            value="{{ old('phone_code', $country->phone_code ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the phone code.</div>
                                      
                                    </div>
                                </div>

                                <div class="row mb-6">


                                    <div class="col-md-4">
                                        <label class="form-label" for="region">Region</label>
                                        <input type="text" class="form-control @error('region') is-invalid @enderror"
                                            id="region" name="region" placeholder="Enter Region"
                                            value="{{ old('region', $country->region ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the region.</div>
                                      
                                    </div>

                                    <div class="col-md-4 mt-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="statusToggle"
                                                name="status" value="active"
                                                {{ isset($country) && $country->status === 'active' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusToggle">Active Status</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($country) ? 'update' : 'add' }}">
                                        {{ isset($country) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('country.index') }}" class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /Bootstrap Validation -->
            </div>
        </div>

     
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
        </script>
    </div>
    <!-- / Content -->
@endsection
