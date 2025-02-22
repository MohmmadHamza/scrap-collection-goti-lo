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
                        <h5 class="card-header">State Create</h5>
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
                            action="{{ isset($state) ? route('state.update', $state->id) : route('state.store') }}"
                            enctype="multipart/form-data">
                          @csrf
                          @if (isset($state))
                              @method('PUT')
                          @endif
                      
                          <div class="row mb-6">
                            <div class="col-md-4">
                                <label class="form-label" for="country_id">Country</label>
                                <select class="form-control js-example-basic-single" id="country_id" name="country_id" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" 
                                            {{-- If the form is being edited, show the selected country. Otherwise, default to India --}}
                                            {{ (isset($state) && $state->country_id == $country->id) || (!isset($state) && $country->name == 'India') ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select a country.</div>
                             
                            </div>
                            
                      
                              <div class="col-md-4">
                                  <label class="form-label" for="name">State Name</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                                         id="name" name="name" placeholder="Enter State Name"
                                         value="{{ old('name', $state->name ?? '') }}" required />
                                  <div class="valid-feedback">Looks good!</div>
                                  <div class="invalid-feedback">Please enter the state name.</div>
                                
                              </div>
                      
                              <div class="col-md-4">
                                  <label class="form-label" for="statusToggle">Active Status</label>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="statusToggle"
                                             name="status" value="active" {{ (isset($state) && $state->status === 'active') ? 'checked' : '' }} />
                                      <label class="form-check-label" for="statusToggle">Active</label>
                                  </div>
                              </div>
                          </div>
                      
                          <div class="mb-3 text-end">
                            <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($state) ? 'update' : 'add' }}">
                                {{ isset($state) ? 'Update' : 'Save' }}
                            </button>
                            <a href="{{ route('state.index') }}" class="btn btn-outline-danger">Cancel</a>
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
