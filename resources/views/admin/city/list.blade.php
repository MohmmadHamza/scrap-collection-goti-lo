@extends('admin.main-template.main-template')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            @include('admin.elements.alert')

            <form class="mb-15" id="kt_user_delete" action="{{ route('city.delete') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                        <!-- Title on the left side -->
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    
                        <!-- Add New button on the right side -->
                        <div>
                            <a class="btn btn-primary" wire:navigate href="{{ route('city.create') }}">
                                <i class="fa fa-plus"></i> {{ __('Add New') }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-header border-bottom">
                       
                        <div class="d-flex align-items-center row pt-4 gap-4 gap-md-0">

                            <div class="col-md-3">
                                <select id="filter_country" class="form-select js-example-basic-single form-control-sm datatable-input">
                                    <option value="">- Select Country -</option>
                                    @foreach ($countrys as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-3">
                                <select id="filter_state" class="form-select  js-example-basic-single form-control-sm datatable-input">
                                    <option value="">- Select State -</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
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
                        <table class="datatables-comman table" id="common_datatable" data-column="id,name,country_id,state_id,created_at,status,actions"
                            data-column-name="id,name,country.name,state.name,created_at,status,actions" data-extra-param="filter_active,filter_country,filter_state"
                            data-extra-param-name="status,country_id,state_id" data-control="{{ route('city.list') }}" data-sorting="4"
                            data-sorting-type="DESC" data-serial-number="1" data-except-sorting-columns="8" role="grid"
                            aria-describedby="common_datatable_info">
                            <thead class="border-top">
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th>Name</th>
                                    <th>Country Name</th>
                                    <th>State Name</th>
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
    <script>
        $(document).ready(function() {
$('.js-example-basic-single').select2();
});
</script>
  
@endsection
