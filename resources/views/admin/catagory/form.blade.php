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
                        <h5 class="card-header">Category Create</h5>
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
                                action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($category))
                                    @method('PUT')
                                @endif

                                <div class="row mb-6">
                                    <div class="col-md-5">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Category Name" value="{{ old('name', $category->name ?? '') }}"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Category Name.</div>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control"
                                            placeholder="Description" required>{{ old('description', $category->description ?? '') }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Description</div>
                                    </div>

                                    <div class="col-md-2 mt-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="statusToggle"
                                                name="status" value="active"
                                                {{ isset($category) && $category->status === 'active' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusToggle">Active Status</label>
                                        </div>
                                    </div>

                                   
                                </div>

                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit" name="submit" value="{{ isset($category) ? 'update' : 'add' }}">
                                        {{ isset($category) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('category.index') }}" class="btn btn-outline-danger">Cancel</a>
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
