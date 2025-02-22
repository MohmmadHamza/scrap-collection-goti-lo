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
                        <h5 class="card-header">Inquiry Create</h5>
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
                                action="{{ isset($inquiry) ? route('inquiry.update', $inquiry->id) : route('inquiry.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($inquiry))
                                    @method('PUT')
                                @endif

                                <div class="row mb-6">
                                    <div class="col-md-4">
                                        <label class="form-label" for="user_id">User</label>
                                        <select class="form-select" id="user_id" name="user_id" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id', $inquiry->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a user.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="category_id">Category</label>
                                        <select class="form-select" id="category_id" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $inquiry->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a category.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="sub_category_id">Subcategory</label>
                                        <select class="form-select" id="sub_category_id" name="sub_category_id"
                                            data-selected-subcategory="{{ old('sub_category_id', $inquiry->sub_category_id ?? '') }}"
                                            required>
                                            <option value="">Select Subcategory</option>
                                            <!-- Subcategories will be populated here based on category selection -->
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a subcategory.</div>
                                    </div>

                                </div>


                                <div class="row mb-6">
                                    <div class="col-md-3">
                                        <label class="form-label" for="amount">Amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            placeholder="Enter Amount" value="{{ old('amount', $inquiry->amount ?? '') }}"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter the amount.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="cgst_per">CGST %</label>
                                        <input type="number" class="form-control" id="cgst_per" name="cgst_per"
                                            placeholder="Enter CGST %"
                                            value="{{ old('cgst_per', $inquiry->cgst_per ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter CGST percentage.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="sgst_per">SGST %</label>
                                        <input type="number" class="form-control" id="sgst_per" name="sgst_per"
                                            placeholder="Enter SGST %"
                                            value="{{ old('sgst_per', $inquiry->sgst_per ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter SGST percentage.</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="igst_per">IGST %</label>
                                        <input type="number" class="form-control" id="igst_per" name="igst_per"
                                            placeholder="Enter IGST %"
                                            value="{{ old('igst_per', $inquiry->igst_per ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter IGST percentage.</div>
                                    </div>
                                </div>



                                <div class="row mb-6">
                                    <div class="col-md-4">
                                        <label class="form-label" for="cgst">CGST</label>
                                        <input type="number" class="form-control" id="cgst" name="cgst"
                                            placeholder="Enter CGST" value="{{ old('cgst', $inquiry->cgst ?? '') }}"
                                            readonly />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter CGST.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="sgst">SGST</label>
                                        <input type="number" class="form-control" id="sgst" name="sgst"
                                            placeholder="Enter SGST" value="{{ old('sgst', $inquiry->sgst ?? '') }}"
                                            readonly />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter SGST.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="igst">IGST</label>
                                        <input type="number" class="form-control" id="igst" name="igst"
                                            placeholder="Enter IGST" value="{{ old('igst', $inquiry->igst ?? '') }}"
                                            readonly />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter IGST.</div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <div class="col-md-4">
                                        <label class="form-label" for="sub_total">Sub Total</label>
                                        <input type="number" class="form-control" id="sub_total" name="sub_total"
                                            placeholder="Enter Sub Total"
                                            value="{{ old('sub_total', $inquiry->sub_total ?? '') }}" required readonly />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter sub total.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="grand_total">Grand Total</label>
                                        <input type="number" class="form-control" id="grand_total" name="grand_total"
                                            placeholder="Enter Grand Total"
                                            value="{{ old('grand_total', $inquiry->grand_total ?? '') }}" required
                                            readonly />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter grand total.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="barcode">Barcode</label>
                                        <input type="text" class="form-control" id="barcode" name="barcode"
                                            placeholder="Enter Barcode"
                                            value="{{ old('barcode', $inquiry->barcode ?? '') }}" />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a barcode.</div>
                                    </div>
                                </div>

                                <div class="row mb-6">



                                    <div class="col-md-4">
                                        <label class="form-label" for="payment_type">Payment Type</label>
                                        <select class="form-select" id="payment_type" name="payment_type">
                                            <option value="">Select Payment Type</option>
                                            <option value="Voucher"
                                                {{ old('payment_type', $inquiry->payment_type ?? '') == 'Voucher' ? 'selected' : '' }}>
                                                Voucher</option>
                                            <option value="exchange"
                                                {{ old('payment_type', $inquiry->payment_type ?? '') == 'exchange' ? 'selected' : '' }}>
                                                Exchange</option>
                                            <option value="Cash"
                                                {{ old('payment_type', $inquiry->payment_type ?? '') == 'Cash' ? 'selected' : '' }}>
                                                Cash</option>

                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a payment type.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="">Select Status</option>
                                            <option value="Awaiting Response from Vendor"
                                                {{ old('status', $inquiry->status ?? '') == 'Awaiting Response from Vendor' ? 'selected' : '' }}>
                                                Awaiting Response from Vendor</option>
                                            <option value="Awaiting Response from Zolio"
                                                {{ old('status', $inquiry->status ?? '') == 'Awaiting Response from Zolio' ? 'selected' : '' }}>
                                                Awaiting Response from Zolio</option>
                                            <option value="In Process"
                                                {{ old('status', $inquiry->status ?? '') == 'In Process' ? 'selected' : '' }}>
                                                In Process</option>
                                            <option value="Awaiting Customer Confirmation"
                                                {{ old('status', $inquiry->status ?? '') == 'Awaiting Customer Confirmation' ? 'selected' : '' }}>
                                                Awaiting Customer Confirmation</option>
                                            <option value="Pickup Scheduled"
                                                {{ old('status', $inquiry->status ?? '') == 'Pickup Scheduled' ? 'selected' : '' }}>
                                                Pickup Scheduled</option>
                                            <option value="Completed"
                                                {{ old('status', $inquiry->status ?? '') == 'Completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="Cancelled"
                                                {{ old('status', $inquiry->status ?? '') == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                            <option value="Closed"
                                                {{ old('status', $inquiry->status ?? '') == 'Closed' ? 'selected' : '' }}>
                                                Closed</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a status.</div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="zolio_status">Zoilo Status</label>
                                        <select class="form-select" id="zolio_status" name="zolio_status">
                                            <option value="">Select Zoilo Status</option>
                                            <option value="Pending"
                                                {{ old('zolio_status', $inquiry->zolio_status ?? '') == 'Pending' ? 'selected' : '' }}>
                                                Pending</zolio_status>
                                            <option value="In Process"
                                                {{ old('zolio_status', $inquiry->zolio_status ?? '') == 'In Process' ? 'selected' : '' }}>
                                                In Process</option>
                                            <option value="Completed"
                                                {{ old('zolio_status', $inquiry->zolio_status ?? '') == 'Completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="Cancelled"
                                                {{ old('zolio_status', $inquiry->zolio_status ?? '') == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                            <option value="Closed"
                                                {{ old('zolio_status', $inquiry->zolio_status ?? '') == 'Closed' ? 'selected' : '' }}>
                                                Closed</option>

                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please select a payment type.</div>
                                    </div>

                                </div>

                                <div class="row mb-6">

                                    <div class="col-md-12">
                                        <label class="form-label" for="message">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="3">{{ old('message', $inquiry->message ?? '') }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a message.</div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <div class="col-md-12">
                                        <label class="form-label" for="attachments">Attachments</label>
                                        <input type="file" class="form-control" id="attachments" name="attachments[]"
                                            multiple />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please upload attachments.</div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit">
                                        {{ isset($inquiry) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('inquiry.index') }}" class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Bootstrap Validation -->
            </div>
        </div>

       
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
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()

            document.getElementById('category_id').addEventListener('change', function() {
                const categoryId = this.value; // Get the selected category ID
                const subCategorySelect = document.getElementById(
                'sub_category_id'); // Get the subcategory select element

                subCategorySelect.innerHTML = '<option value="">Select Subcategory</option>'; // Reset subcategories

                if (categoryId) {
                    fetch(`/subcategories/${categoryId}`) // Call the route to fetch subcategories
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Populate the subcategories
                            data.forEach(subcategory => {
                                subCategorySelect.innerHTML +=
                                    `<option value="${subcategory.id}">${subcategory.name}</option>`;
                            });

                            // After loading subcategories, set the pre-selected subcategory (if any)
                            const selectedSubcategoryId = document.getElementById('sub_category_id').getAttribute(
                                'data-selected-subcategory');
                            if (selectedSubcategoryId) {
                                subCategorySelect.value = selectedSubcategoryId;
                            }
                        })
                        .catch(error => console.error('Error fetching subcategories:', error));
                }
            });

            // Trigger the change event when the page loads to fetch subcategories if a category is pre-selected
            window.onload = function() {
                const selectedCategoryId = document.getElementById('category_id').value;
                if (selectedCategoryId) {
                    document.getElementById('category_id').dispatchEvent(new Event('change'));
                }
            };




            function calculateTaxes() {
                const amount = parseFloat(document.getElementById('amount').value) || 0;
                const cgstPer = parseFloat(document.getElementById('cgst_per').value) || 0;
                const sgstPer = parseFloat(document.getElementById('sgst_per').value) || 0;
                const igstPer = parseFloat(document.getElementById('igst_per').value) || 0;

                const cgst = (amount * cgstPer) / 100;
                const sgst = (amount * sgstPer) / 100;
                const igst = (amount * igstPer) / 100;

                document.getElementById('cgst').value = cgst.toFixed(2);
                document.getElementById('sgst').value = sgst.toFixed(2);
                document.getElementById('igst').value = igst.toFixed(2);

                const subTotal = amount + cgst + sgst + igst;
                document.getElementById('sub_total').value = subTotal.toFixed(2);
                document.getElementById('grand_total').value = subTotal.toFixed(2);
            }

            document.getElementById('amount').addEventListener('input', calculateTaxes);
            document.getElementById('cgst_per').addEventListener('input', calculateTaxes);
            document.getElementById('sgst_per').addEventListener('input', calculateTaxes);
            document.getElementById('igst_per').addEventListener('input', calculateTaxes);
        </script>
    </div>
    <!-- / Content -->
@endsection
