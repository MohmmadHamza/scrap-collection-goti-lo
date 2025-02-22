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
                        <h5 class="card-header">Inquiry Question Answer Create</h5>
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
                                action="{{ isset($inquiryQuestionAnswer) ? route('inquiry-answer.update', $inquiryQuestionAnswer->id) : route('inquiry-answer.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($inquiryQuestionAnswer))
                                    @method('PUT')
                                @endif

                                <div class="row mb-6">




                                </div>

                                <div class="row mb-6">



                                </div>

                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary mx-2" type="submit" name="submit"
                                        value="{{ isset($inquiryQuestionAnswer) ? 'update' : 'add' }}">
                                        {{ isset($inquiryQuestionAnswer) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('inquiry-answer.index') }}" class="btn btn-outline-danger">Cancel</a>
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
        </script>
    </div>
    <!-- / Content -->
@endsection
