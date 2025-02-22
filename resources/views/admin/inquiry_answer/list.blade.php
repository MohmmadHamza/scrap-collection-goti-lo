@extends('admin.main-template.main-template')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            @include('admin.elements.alert')

            <form class="mb-15" id="kt_user_delete" action="{{ route('inquiry-answer.delete') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                      
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    
                      
                        <div>
                            <a class="btn btn-primary" href="{{ route('inquiry-answer.create') }}">
                                <i class="fa fa-plus"></i> {{ __('Add New') }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-header border-bottom">
                       
                        <div class="d-flex align-items-center row pt-4 gap-4 gap-md-0">

                          

                            <div class="col-md-2" style="display: flex;">
                                
                                <button class="btn btn-danger" id="kt_delete" type="submit" name="submit" value="delete"
                                    style="display: none">
                                    <i class="ti ti-trash ti-md"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive">
                        <table class="datatables-comman table"  id="common_datatable" data-column="id,answer_text,question_type,created_at"
                            data-column-name="id,answer_text,question_type,created_at,actions" data-extra-param=""
                            data-extra-param-name="" data-control="{{ route('inquiry-answer.list') }}" data-sorting="1"
                            data-sorting-type="ASC" data-serial-number="1" data-except-sorting-columns="8" role="grid"
                            aria-describedby="common_datatable_info">
                            <thead class="border-top">
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th>Answer Texet</th>
                                    <th>Question Type</th>
                                    <th>Created On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </form>



        </div>


    </div>
    <!-- / Content -->
    <!-- Page JS -->
  
@endsection
