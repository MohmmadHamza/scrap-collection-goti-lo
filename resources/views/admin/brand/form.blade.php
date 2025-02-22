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
                        <h5 class="card-header">Brand Create</h5>
                        <div class="card-body">
                              <!-- Display Error Messages -->
                              @if ($errors->any())
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                          @endif

                          <!-- Display Success Message -->
                          @if (session('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('success') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                          @endif
                          <form class="needs-validation" novalidate method="POST"
                          action="{{ isset($brand) ? route('brand.update', $brand->id) : route('brand.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        @if (isset($brand))
                            @method('PUT')
                        @endif
                    
                        <div class="row mb-6">
                            <div class="col-md-4">
                                <label class="form-label" for="name">Brand Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter Brand Name" value="{{ old('name', $brand->name ?? '') }}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Brand Name.</div>
                            </div>
                    
                            <div class="col-md-4">
                                <label class="form-label" for="sort_order">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" 
                                       placeholder="Enter Sort Order" value="{{ old('sort_order', $brand->sort_order ?? '') }}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Sort Order.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="description">Description</label>
                                <textarea id="description" name="description" class="form-control"
                                          placeholder="Description" required>{{ old('description', $brand->description ?? '') }}</textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Description</div>
                            </div>
                    
                            
                            
                        </div>
                    
                        <div class="row mb-6">
                            <div class="col-md-4">
                                <label class="form-label" for="image_url">Brand Image</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" 
                                       accept="image/*" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please upload a Brand Image.</div>
                            </div>

                             <!-- Display existing profile picture if editing -->
									 @if (isset($brand) && $brand->image_url)
                                     <div class="col-md-4">
                                        
                                             <div class="mb-2">
                                                 <img src="{{ asset('assets/' . $brand->image_url) }}"
                                                     alt="Profile Picture" class="rounded-circle"
                                                     style="width: 100px; height: 100px; object-fit: cover;">
                                             </div>
                                       
                                     </div>
                                     @endif
                    
                            <div class="col-md-2 mt-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="statusToggle"
                                           name="status" value="active"
                                           {{ isset($brand) && $brand->status === 'active' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="statusToggle">Active Status</label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="mb-3 text-end">
                            <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($brand) ? 'update' : 'add' }}">
                                {{ isset($brand) ? 'Update' : 'Save' }}
                            </button>
                            <a href="{{ route('brand.index') }}" class="btn btn-outline-danger">Cancel</a>
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
