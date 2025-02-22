@extends('admin.main-template.main-template')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            @include('admin.elements.alert')

            <form class="mb-15" id="kt_user_delete" action="{{ route('inquery-question.delete') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                        <!-- Title on the left side -->
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    
                        <!-- Add New button on the right side -->
                        <div>
                            <a class="btn btn-primary" wire:navigate href="{{ route('inquery-question.create') }}">
                                <i class="fa fa-plus"></i> {{ __('Add New') }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-header border-bottom">
                       
                        <div class="d-flex align-items-center row pt-4 gap-4 gap-md-0">

                            <div class="col-md-3">
                                <select id="filter_subcategory" class="form-select form-control-sm datatable-input">
                                    <option value="">- Select Sub Category -</option>
                                    @foreach ($subcategorys as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            
                            
                            <div class="col-md-3">
                                <select id="filter_active" class="form-select form-control-sm datatable-input">
                                    <option value="">- Select Status -</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                         

                            <div class="col-md-2" style="display: flex;">
                                <button type="button" class="btn btn-dark" id="kt_reset"
                                style="margin-right: 10px;">Reset</button>
                                <button class="btn btn-danger" id="kt_delete" type="submit" name="submit" value="delete"
                                    style="display: none">
                                    <i class="ti ti-trash ti-md"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive">
                        <table class="datatables-comman table" id="common_datatable" data-column="id,question_text,question_type,subcategory_id,created_at,status"
                            data-column-name="id,question_text,question_type,subcategory.name,created_at,status,actions" data-extra-param="filter_active,filter_subcategory"
                            data-extra-param-name="status,subcategory_id" data-control="{{ route('inquery-question.list') }}" data-sorting="1"
                            data-sorting-type="DESC" data-serial-number="4" data-except-sorting-columns="8" role="grid"
                            aria-describedby="common_datatable_info">
                            <thead class="border-top">
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th>Question Text</th>
                                    <th>Question Type</th>
                                    <th>Sub Category</th>
                                    <th>Created On</th>
                                    <th>Status</th>
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
