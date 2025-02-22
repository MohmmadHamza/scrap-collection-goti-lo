@extends('admin.main-template.main-template')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-6">
                <div class="col-md">
                    <div class="card">
                        <h5 class="card-header">{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h5>
                        <div class="card-body">
                            <!-- Display Error and Success Messages -->
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

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form class="needs-validation" novalidate method="POST"
                                action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($product))
                                    @method('PUT')
                                @endif

                                <!-- Product Name, Category, and Subcategory -->
                                <div class="row mb-6">
                                    <div class="col-md-4">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Product Name" value="{{ old('name', $product->name ?? '') }}"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Name.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="description">Product Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Product Description"
                                            value="{{ old('description', $product->description ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Product description is required.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="brand_id">Brand</label>
                                        <select class="form-select js-example-basic-single" id="brand_id" name="brand_id" required>
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a Brand.</div>
                                    </div>

                                </div>

                                <!-- Brand, Description, and Price -->
                                <div class="row mb-6">


                                    <div class="col-md-4">
                                        <label class="form-label" for="category_id">Category</label>
                                        <select class="form-select js-example-basic-single" id="category_id"
                                            name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a Category.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="subcategory_id">Subcategory</label>
                                        <select class="form-select js-example-basic-single" id="subcategory_id" name="subcategory_id" required>
                                            <option value="">Select Subcategory</option>
                                            @if (isset($subcategories))
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ old('subcategory_id', $product->subcategory_id ?? '') == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a Subcategory.</div>
                                    </div>



                                    <div class="col-md-4">
                                        <label class="form-label" for="user_id">User</label>
                                        <select class="form-select js-example-basic-single" id="user_id" name="user_id" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id', $product->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a User.</div>
                                    </div>
                                    



                                </div>

                                <div class="row mb-6">
                                    <div class="col-md-4">
                                        <label class="form-label" for="stock_quantity">Stock Quantity</label>
                                        <input type="text" class="form-control" id="stock_quantity" name="stock_quantity"
                                            placeholder="Enter Product Stock Quantity"
                                            value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Stock Quantity.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="discount">Discount %</label>
                                        <input type="text" class="form-control" id="discount" name="discount"
                                            placeholder="Enter Product Discount  %"
                                            value="{{ old('discount', $product->discount ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Discount.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="voucher_discount	">Voucher Discount %</label>
                                        <input type="text" class="form-control" id="voucher_discount"
                                            name="voucher_discount" placeholder="Enter Product Voucher Discount  %"
                                            value="{{ old('voucher_discount', $product->voucher_discount ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Voucher Discount.</div>
                                    </div>





                                </div>

                                <div class="row mb-6">



                                    <div class="col-md-4">
                                        <label class="form-label" for="exchange_discount">Exchange Discount %</label>
                                        <input type="text" class="form-control" id="exchange_discount"
                                            name="exchange_discount" placeholder="Enter Product Exchange Discount  %"
                                            value="{{ old('exchange_discount', $product->exchange_discount ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Exchange Discount.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="price">Price</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="Enter Product Price"
                                            value="{{ old('price', $product->price ?? '') }}" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Price.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="tags">Tags</label>
                                        <input type="text" class="form-control" id="tags" name="tags"
                                            placeholder="Enter Product Tags"
                                            value="{{ old('tags', $product->tags ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter Product Tags.</div>
                                    </div>




                                </div>

                                <!-- Status and Featured Toggles -->
                                <div class="row mb-6">
                                    <div class="col-md-2">
                                        <div class="form-check form-switch mt-4">
                                            <input class="form-check-input" type="checkbox" id="statusToggle"
                                                name="status" value="active"
                                                {{ old('status', $product->status ?? '') === 'active' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusToggle">Active Status</label>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-2">
                                        <div class="form-check form-switch mt-4">
                                            <input type="hidden" name="is_featured" value="0">
                                            <input class="form-check-input" type="checkbox" id="is_featured"
                                                name="is_featured" value="1"
                                                {{ old('is_featured', $product->is_featured ?? '') == 1 ? 'checked' : '' }} />


                                            <label class="form-check-label" for="is_featured">Featured Product</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit">
                                        {{ isset($product) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('product.index') }}" class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Scripts -->
        <script>
            // JavaScript form validation
            (function() {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')

                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
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
        // Initialize Select2 on the category and user select elements
        $('#category_id').select2({
            placeholder: 'Select Category'
        });


        $('#subcategory_id').select2({
            placeholder: 'Select Category'
        });

        $('#brand_id').select2({
            placeholder: 'Select Category'
        });

        $('#user_id').select2({
            placeholder: 'Select Category'
        });
        

        // Get old subcategory ID, if available (set by backend on redirect)
        var selectedSubcategoryId = '{{ old("subcategory_id", $product->subcategory_id ?? '') }}';

        // Load subcategories when category is selected
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            var subcategorySelect = $('#subcategory_id');

            // Clear subcategory options and add placeholder
            subcategorySelect.html('<option value="">Select Subcategory</option>');

            if (categoryId) {
                // Fetch subcategories for the selected category
                fetch(`/get-subcategories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
                            var isSelected = subcategory.id == selectedSubcategoryId ? 'selected' : '';
                            subcategorySelect.append(
                                `<option value="${subcategory.id}" ${isSelected}>${subcategory.name}</option>`
                            );
                        });
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }
        });

        // Trigger change event on page load if category and subcategory are preselected
        if ($('#category_id').val()) {
            $('#category_id').trigger('change');
        }
    });
        </script>
    </div>
@endsection
