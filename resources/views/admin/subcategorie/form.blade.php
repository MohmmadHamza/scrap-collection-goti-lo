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
                        <h5 class="card-header">{{ isset($subcategory) ? 'Edit Subcategory' : 'Create Subcategory' }}</h5>
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
                            action="{{ isset($subcategory) ? route('subcategory.update', $subcategory->id) : route('subcategory.store') }}"
                            enctype="multipart/form-data">
                          @csrf
                          @if (isset($subcategory))
                              @method('PUT')
                          @endif
                      
                          <div class="row mb-6">
                              <div class="col-md-4">
                                  <label class="form-label" for="name">Name</label>
                                  <input type="text" class="form-control" id="name" name="name"
                                         placeholder="Enter Subcategory Name" value="{{ old('name', $subcategory->name ?? '') }}"
                                         required />
                                  <div class="valid-feedback">Looks good!</div>
                                  <div class="invalid-feedback">Please enter Subcategory Name.</div>
                              </div>
                      
                              <div class="col-md-4">
                                <label class="form-label" for="category_id">Category</label>
                                <select id="category_id" name="category_id" class="form-select js-example-basic-single" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ (isset($subcategory) && $subcategory->category_id == $category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select a Category.</div>
                            </div>
                            
                            
                              <div class="col-md-4">
                                  <label class="form-label" for="description">Description</label>
                                  <textarea id="description" name="description" class="form-control"
                                            placeholder="Description" required>{{ old('description', $subcategory->description ?? '') }}</textarea>
                                  <div class="valid-feedback">Looks good!</div>
                                  <div class="invalid-feedback">Please enter a Description.</div>
                              </div>
                          </div>
                      
                          <div class="row mb-6">
                              <div class="col-md-2 mt-6">
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="statusToggle"
                                             name="status" value="active"
                                             {{ isset($subcategory) && $subcategory->status === 'active' ? 'checked' : '' }} />
                                      <label class="form-check-label" for="statusToggle">Active Status</label>
                                  </div>
                              </div>
                          </div>
                      
                          <div class="mb-3 text-end">
                              <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($subcategory) ? 'update' : 'add' }}">
                                  {{ isset($subcategory) ? 'Update' : 'Save' }}
                              </button>
                              <a href="{{ route('subcategory.index') }}" class="btn btn-outline-danger">Cancel</a>
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
