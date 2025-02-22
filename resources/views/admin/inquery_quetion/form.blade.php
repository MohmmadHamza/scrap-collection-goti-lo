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
                        <h5 class="card-header">Inquery Question Create</h5>
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
                            <form id="inquiryForm" class="needs-validation" novalidate method="POST"
                                action="{{ isset($inqueryQuestion) ? route('inquery-question.update', $inqueryQuestion->id) : route('inquery-question.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($inqueryQuestion))
                                    @method('PUT')
                                @endif

                                <!-- Subcategory Dropdown -->
                                <div class="row mb-6">


                                    <div class="col-md-4">
                                        <label class="form-label" for="category_id">Category</label>
                                        <select class="form-select js-example-basic-single" id="category_id" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $inqueryQuestion->subcategory->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a category.</div>
                                    </div>
                                    
                                    <!-- Subcategory Dropdown -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="subcategory_id">Subcategory</label>
                                        <select class="form-select js-example-basic-single" id="subcategory_id" name="subcategory_id" required>
                                            <option value="">Select Subcategory</option>
                                            @if (isset($subcategories))
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ old('subcategory_id', $inqueryQuestion->subcategory_id ?? '') == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a Subcategory.</div>
                                    </div>

                                    <!-- Question Text Input -->
                                    <div class="col-md-4">
                                        <label class="form-label" for="question_text">Question Text</label>
                                        <input type="text" class="form-control" id="question_text" name="question_text"
                                            placeholder="Enter Question Text"
                                            value="{{ old('question_text', $inqueryQuestion->question_text ?? '') }}"
                                            required />
                                        <div class="invalid-feedback">Please enter Question Text.</div>
                                    </div>

                                   
                                </div>

                                <!-- Question Type Dropdown -->
                                <div class="row mb-6">
                                    <div class="col-md-5">
                                        <label class="form-label" for="question_type">Question Type</label>
                                        <select class="form-select form-control-sm datatable-input" id="question_type" name="question_type" required>
                                            <option value="">Select Question Type</option>
                                            @foreach (['mcq', 'brand', 'text', 'image', 'video', 'document', 'long_text', 'select', 'numeric'] as $type)
                                                <option value="{{ $type }}"
                                                    {{ old('question_type', $inqueryQuestion->question_type ?? '') == $type ? 'selected' : '' }}>
                                                    {{ ucfirst($type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a question type.</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="sort_order">Sort Order</label>
                                        <input type="text" class="form-control" id="sort_order" name="sort_order"
                                            placeholder="Enter Question Text"
                                            value="{{ old('sort_order', $inqueryQuestion->sort_order ?? '') }}"
                                            required />
                                        <div class="invalid-feedback">Please enter Sort Order.</div>
                                    </div>

                                    <!-- Status Toggle -->
                                    <div class="col-md-2 mt-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="statusToggle" name="status"
                                                value="active"
                                                {{ isset($inqueryQuestion) && $inqueryQuestion->status === 'active' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusToggle">Active Status</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Options Input for MCQ and Select Types -->
                                <div id="optionsContainer" class="col-md-6 {{ (old('question_type', $inqueryQuestion->question_type ?? '') == 'mcq' || old('question_type', $inqueryQuestion->question_type ?? '') == 'select') ? '' : 'd-none' }}">
                                    <div class="col-md-10">
                                        <label class="form-label" for="options">Options</label>
                                        <div id="optionsWrapper">
                                            @if(isset($inqueryQuestion) && !empty($inqueryQuestion->options))
                                                @foreach(json_decode($inqueryQuestion->options) as $option)
                                                    <div class="input-group mb-2 option-group">
                                                        <input type="text" class="form-control" name="options[]" value="{{ $option }}" placeholder="Enter Option" />
                                                        <button type="button" class="btn btn-danger remove-option">Remove</button>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="input-group mb-2 option-group">
                                                    <input type="text" class="form-control" name="options[]" placeholder="Enter Option" />
                                                    <button type="button" class="btn btn-danger remove-option">Remove</button>
                                                </div>
                                            @endif
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="addOption">Add Option</button>
                                    </div>
                                </div>
                                

                                <!-- Submit Button -->
                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit">
                                        {{ isset($inqueryQuestion) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('inquery-question.index') }}"
                                        class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /Bootstrap Validation -->
            </div>
        </div>

      
        <script>
         document.addEventListener('DOMContentLoaded', function() {
    const questionTypeElement = document.getElementById('question_type');
    const optionsContainer = document.getElementById('optionsContainer');
    const optionsWrapper = document.getElementById('optionsWrapper');
    const addOptionButton = document.getElementById('addOption');

    // Function to toggle options input visibility based on question type
    function toggleOptions() {
        const selectedType = questionTypeElement.value;
        if (selectedType === 'mcq' || selectedType === 'select') {
            optionsContainer.classList.remove('d-none');
        } else {
            optionsContainer.classList.add('d-none');
        }
    }

    // Call toggleOptions on page load to check if the selected type is 'mcq' or 'select'
    toggleOptions();

    // Show/hide options input when question type changes
    questionTypeElement.addEventListener('change', toggleOptions);

    // Add option input
    addOptionButton.addEventListener('click', function() {
        const newOptionGroup = document.createElement('div');
        newOptionGroup.classList.add('input-group', 'mb-2', 'option-group');
        newOptionGroup.innerHTML = `
            <input type="text" class="form-control" name="options[]" placeholder="Enter Option" />
            <button type="button" class="btn btn-danger remove-option">Remove</button>
        `;
        optionsWrapper.appendChild(newOptionGroup);
    });

    // Remove option input
    optionsWrapper.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-option')) {
            event.target.closest('.option-group').remove();
        }
    });
});



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

                                var submitButton = form.querySelector('button[type="submit"]');
                                submitButton.disabled = true;
                                submitButton.textContent = 'Submitting...';
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()


            $(document).ready(function () {
    // Initialize Select2 on the category and subcategory select elements
    $('#category_id').select2({
        placeholder: 'Select Category'
    });

    $('#subcategory_id').select2({
        placeholder: 'Select Subcategory'
    });

    // Load subcategories when category is selected
    $('#category_id').on('change', function () {
        var categoryId = $(this).val();
        var subcategorySelect = $('#subcategory_id');

        // Clear the subcategory dropdown and disable it
        subcategorySelect.html('<option value="">Select Subcategory</option>').prop('disabled', true).select2();

        if (categoryId) {
            // Fetch subcategories for the selected category
            fetch(`/get-subcategories/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(subcategory => {
                        subcategorySelect.append(
                            `<option value="${subcategory.id}">${subcategory.name}</option>`
                        );
                    });
                    // Enable the subcategory dropdown after populating it
                    subcategorySelect.prop('disabled', false).select2();

                    // Set the old subcategory if it exists
                    var selectedSubcategoryId = '{{ old("subcategory_id", $inqueryQuestion->subcategory_id ?? '') }}';
                    if (selectedSubcategoryId) {
                        subcategorySelect.val(selectedSubcategoryId).trigger('change');
                    }
                })
                .catch(error => console.error('Error fetching subcategories:', error));
        }
    });

    // Trigger change event on page load if category is preselected
    if ($('#category_id').val()) {
        $('#category_id').trigger('change');
    }
});

        </script>
    </div>
    <!-- / Content -->
@endsection
