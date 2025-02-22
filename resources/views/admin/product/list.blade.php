@extends('admin.main-template.main-template')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            @include('admin.elements.alert')

            <form class="mb-15" id="kt_user_delete" action="{{ route('product.delete') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                      
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    
                      
                        <div>
                            <a class="btn btn-primary" href="{{ route('product.create') }}">
                                <i class="fa fa-plus"></i> {{ __('Add New') }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-header border-bottom">
                       
                        <div class="d-flex align-items-center row pt-4 gap-4 gap-md-0">

                            <div class="col-md-3">
                                <select id="filter_user" class="form-select form-control-sm datatable-input">
                                    <option value="">- Select User -</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                        <table class="datatables-comman table"  id="common_datatable" data-column="id,name,description,price,category_id,brand_id,user_id,status,created_at"
                            data-column-name="id,name,user.name,description,price,category.name,brand.name,status,created_at,actions" data-extra-param="filter_active,filter_user"
                            data-extra-param-name="status,user_id" data-control="{{ route('product.list') }}" data-sorting="8"
                            data-sorting-type="DESC" data-serial-number="1" data-except-sorting-columns="8" role="grid"
                            aria-describedby="common_datatable_info">
                            <thead class="border-top">
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                  
                                    <th>Category</th>
                                    <th>Brnad</th>
                                    <th>Status</th>
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
