@extends('admin.main-template.main-template')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <!-- Axios CDN -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


        <div class="container-xxl flex-grow-1 container-p-y">
            @include('admin.elements.alert')


            <form class="mb-15" id="kt_user_delete" action="{{ route('inquiry.delete') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center"
                        style="background-color: #f8f9fa;">
                        <!-- Title on the left side -->
                        <h5 class="card-title mb-0">{{ $title }}</h5>

                        <!-- Add New button on the right side -->
                        <div>

                        </div>
                    </div>

                    <div class="card-header border-bottom">

                        <div class="d-flex align-items-center row pt-4 gap-4 gap-md-0">


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
                        <table class="datatables-comman table" id="common_datatable"
                            data-column="id,user_id,category_id,sub_category_id,zolio_status,created_at,status"
                            data-column-name="id,user,category,sub_category,zolio_status,created_at,status,actions"
                            data-extra-param="filter_active" data-extra-param-name="status"
                            data-control="{{ route('inquiry.list') }}" data-sorting="5" data-sorting-type="DESC"
                            data-serial-number="1" data-except-sorting-columns="8" role="grid"
                            aria-describedby="common_datatable_info">
                            <thead class="border-top">
                                <tr>
                                    <th><input class="form-check-input" type="checkbox" name="checkAll" id="checkAll"></th>
                                    <th>User Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Zoilo Status</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </form>

            <div class="modal fade" id="followupModel" tabindex="-1" aria-labelledby="followupModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Follow Up</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="followUpForm" method="POST">

                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="inquiry_id" id="inquiry_id" value="">
                                    <input type="hidden" name="inquiry_assigned_id" id="inquiry_assigned_id"
                                        value="">


                                    <div class="mb-3">
                                        <label for="followUpStatus" class="form-label">Follow Up Status</label>
                                        <select id="filter_status" class="form-select form-control-sm datatable-input"
                                            name="status">
                                            <option value="">- Select Status -</option>
                                            <option value="Pending">Pending</option>
                                            <option value="In Process">In Process</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Follow Up Notes</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="followupModelList" tabindex="-1" aria-labelledby="followupModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Follow Up List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="followupList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="valuationModel" tabindex="-1" aria-labelledby="openValuationLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Valuation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="valuationForm" action="{{ route('inquiry-valuation.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="inquiry_assigned_id" id="inquiry_assigned_id"
                                    value="">

                                <!-- User Dropdown -->
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User</label>
                                    <select id="user_id" name="user_id" class="form-select form-control-sm">
                                        <option value="">- Select User -</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Schedule Date -->
                                <div class="mb-3">
                                    <label for="schedule_date" class="form-label">Schedule Date</label>
                                    <input type="date" id="schedule_date" name="schedule_date" class="form-control">
                                </div>

                                <!-- Status Dropdown -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Follow Up Status</label>
                                    <select id="status" name="status" class="form-select form-control-sm">
                                        <option value="">- Select Status -</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Process">In Process</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>

                                <!-- Valuation Offer -->
                                <div class="mb-3">
                                    <label for="valuation_offer" class="form-label">Valuation Offer</label>
                                    <select id="valuation_offer" name="valuation_offer"
                                        class="form-select form-control-sm">
                                        <option value="">- Select Valuation Offer -</option>
                                        <option value="exchange">Exchange</option>
                                        <option value="voucher">Voucher</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>

                                <!-- Amount -->
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" id="amount" name="amount" class="form-control"
                                        step="0.01">
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade" id="valuationList" tabindex="-1" aria-labelledby="valuationListLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Valuation List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Schedule Date</th>
                                        <th>Status</th>
                                        <th>Valuation Offer</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="valuationList">
                                    <!-- Data will be populated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade" id="inquiryPickupModel" tabindex="-1" aria-labelledby="openInquiryPickupLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inquiry Pickup</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="inquiryPickupForm" action="{{ route('inquiry-pickup.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="inquiry_assigned_id" id="inquiry_assigned_id"
                                    value="">
                                <input type="hidden" name="_method" id="method" value="POST">
                                <!-- Added hidden method field -->

                                <!-- User Dropdown -->
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User</label>
                                    <select id="user_id" name="user_id" class="form-select form-control-sm">
                                        <option value="">- Select User -</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Schedule Date -->
                                <div class="mb-3">
                                    <label for="schedule_date" class="form-label">Schedule Date</label>
                                    <input type="date" id="schedule_date" name="schedule_date" class="form-control">
                                </div>

                                <!-- Status Dropdown -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Inquiry Valuation Status</label>
                                    <select id="status" name="status" class="form-select form-control-sm">
                                        <option value="">- Select Status -</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Process">In Process</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>

                                <!-- Amount -->
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" id="amount" name="amount" class="form-control"
                                        step="0.01">
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade" id="inquiryPickupList" tabindex="-1" aria-labelledby="inquiryPickupListLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inquiry Pickup List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Schedule Date</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="inquiryPickupList">
                                    <!-- Data will be populated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>




    </div>
    <!-- / Content -->
    <!-- Page JS -->
    <script>
        
   function openFollowUpModal(type, inquiryId, inquiryAssignId = null, followUpId = null) {
    $('#followupModelList').modal('hide'); // Ensure list modal is hidden
    clearFollowUpModal(); // Clear modal data

    if (type === "edit") {
        // Fetch follow-up details for editing
        $.ajax({
            url: `/inquiry-followup/${followUpId}/edit`,
            method: 'GET',
            success: function(data) {
                // Populate form fields with data
                $("#followupModel #inquiry_id").val(data.inquiry_id);
                $("#followupModel #inquiry_assigned_id").val(data.inquiry_assigned_id);
                $("#comment").val(data.comment); 
                $("#filter_status").val(data.status);

                // Update form action and method for editing
                const form = $("#followUpForm");
                form.attr('action', `/inquiry-followup/${followUpId}`);
                form.find("input[name='_method']").val('PUT'); // Set method to PUT

                $('#followupModel').modal('show'); // Show modal
            },
            error: function(xhr) {
                alert("Failed to fetch follow-up details. Please try again.");
            }
        });
    } else {
        // Prepare modal for creating a new follow-up
        $("#followupModel #inquiry_id").val(inquiryId);
        $("#followupModel #inquiry_assigned_id").val(inquiryAssignId);
        $("#comment").val('');
        $("#filter_status").val('');

        // Reset form action and method for creating
        const form = $("#followUpForm");
        form.attr('action', "{{ route('inquiry-followup.store') }}");
        form.find("input[name='_method']").val('POST'); // Set method to POST

        $('#followupModel').modal('show'); // Show modal
    }
}


function openFollowUpModalList(inquiryId, inquiryAssignId) {
    // Ensure the edit modal is closed to avoid overlap
    $('#followupModel').modal('hide');

    // Clear previous list data
    $("#followupList").empty();

    $("#followupModelList #inquiry_id").val(inquiryId);
    $("#followupModelList #inquiry_assigned_id").val(inquiryAssignId);

    // Fetch list of follow-ups
    $.ajax({
        url: `/inquiry-followup?inquiry_id=${inquiryId}&inquiry_assigned_id=${inquiryAssignId}`,
        method: 'GET',
        success: function(data) {
            // Populate modal with follow-up entries
            data.forEach(function(entry) {
                $("#followupList").append(`
                    <tr>
                        <td>${entry.status}</td>
                        <td>${entry.comment}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical ti-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="javascript:;" class="dropdown-item" onclick="openFollowUpModal('edit', ${inquiryId}, ${inquiryAssignId}, ${entry.id})">Edit</a>
                                    <a href="javascript:;" class="dropdown-item" onclick="deleteFollowup(${entry.id})">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `);
            });

            $('#followupModelList').modal('show');
        },
        error: function(xhr) {
            alert("Failed to fetch follow-up entries.");
        }
    });
}

// Helper function to clear follow-up modal data
function clearFollowUpModal() {
    const form = $("#followUpForm");
    form.attr('action', ""); // Clear form action
    form.find("input[name='_method']").val('POST'); // Default to POST
    $("#followupModel #inquiry_id").val('');
    $("#followupModel #inquiry_assigned_id").val('');
    $("#comment").val('');
    $("#filter_status").val('');
}

function deleteFollowup(followUpId) {
    // Confirm before deletion
    if (confirm("Are you sure you want to delete this follow-up?")) {
        $.ajax({
            url: `/inquiry-followup/${followUpId}`, // Endpoint for deletion
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function(response) {
                alert("Follow-up deleted successfully.");
                // Refresh the follow-up list after deletion
                const inquiryId = $("#followupModelList #inquiry_id").val();
                const inquiryAssignId = $("#followupModelList #inquiry_assigned_id").val();
                openFollowUpModalList(inquiryId, inquiryAssignId);
            },
            error: function(xhr) {
                alert("Failed to delete the follow-up. Please try again.");
            }
        });
    }
}





        function openValuation(inquiryAssignId, valuationId = null) {
            // Clear previous form data
            $("#valuationModel #inquiry_assigned_id").val(inquiryAssignId);
            $("#valuationModel #user_id").val('');
            $("#valuationModel #schedule_date").val('');
            $("#valuationModel #status").val('');
            $("#valuationModel #valuation_offer").val('');
            $("#valuationModel #amount").val('');
            $("#valuationModel #description").val('');

            // Reset the form action and method for creating (store)
            $("#valuationForm").attr("action", "{{ route('inquiry-valuation.store') }}");
            $("#valuationForm").find("input[name='_method']").remove(); // Remove any hidden method field

            // If editing, fetch the data and populate the form
            if (valuationId) {
                $.ajax({
                    url: '/inquiry-valuation/' + valuationId + '/edit', 
                    method: 'GET',
                    success: function(data) {
                        // Populate the form with the fetched data
                        $("#valuationModel #user_id").val(data.user_id);
                        $("#valuationModel #schedule_date").val(data.schedule_date);
                        $("#valuationModel #status").val(data.status);
                        $("#valuationModel #valuation_offer").val(data.valuation_offer);
                        $("#valuationModel #amount").val(data.amount);
                        $("#valuationModel #description").val(data.description);

                        // Change form action to update
                        $("#valuationForm").attr("action", '/inquiry-valuation/' + valuationId);
                        // Set the form method to PUT (for updating)
                        $("#valuationForm").append('<input type="hidden" name="_method" value="PUT">');
                    },
                    error: function(xhr) {
                        console.error("Failed to fetch valuation data: ", xhr);
                        alert("An error occurred while fetching the valuation data.");
                    }
                });
            }

            // Open the modal
            $('#valuationModel').modal('show');
        }


        function openValuationList(inquiryAssignId) {
            // Clear the previous table content
            $("#valuationList tbody").empty();

            // Fetch data for the valuation list and populate the table
            $.ajax({
                url: '/inquiry-valuation/' + inquiryAssignId,
                method: 'GET',
                success: function(data) {
                    data.forEach(function(entry) {
                        // Format the schedule date
                        let scheduleDate = new Date(entry.schedule_date);
                        let formattedDate = scheduleDate.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        });

                        $("#valuationList tbody").append(`
                    <tr>
                        <td>${entry.user.name}</td>
                        <td>${formattedDate}</td>
                        <td>${entry.status}</td>
                        <td>${entry.valuation_offer}</td>
                        <td>${entry.amount}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical ti-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                    <a href="javascript:;" class="dropdown-item" onclick="openValuation(${inquiryAssignId}, ${entry.id})">Edit</a>
                                 <a href="javascript:;" class="dropdown-item" onclick="deleteValuation(${entry.id})">Delete</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                `);
                    });

                    // Show the valuation list modal
                    $('#valuationList').modal('show');
                },
                error: function(xhr) {
                    console.error("Failed to fetch valuation entries: ", xhr);
                    alert("An error occurred while fetching the valuation entries.");
                }
            });
        }

        // Optional: Clear modal data when closed
        $('#valuationList').on('hidden.bs.modal', function() {
            $("#valuationList tbody").empty();
            // Reset z-index when the valuation list modal is closed
            $(this).css('z-index', '');
        });

        $('#valuationModel').on('hidden.bs.modal', function() {
            $("#valuationModel form").trigger('reset');
            // Reset z-index of valuationList when the valuationModel modal is closed
            $('#valuationList').css('z-index', '');
        });

        // Form submit logic
        $("#valuationModel form").on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            let formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: $(this).attr("action"),
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success (You can update the list or show a success message)
                    alert("Valuation data saved successfully!");
                    $('#valuationModel').modal('hide');
                    openValuationList($("#valuationModel #inquiry_assigned_id")
                .val()); // Refresh the list
                },
                error: function(xhr) {
                    // Handle error
                    console.error("Error saving valuation data: ", xhr);
                    alert("An error occurred while saving the valuation data.");
                }
            });
        });

        function deleteValuation(id) {
            if (confirm('Are you sure you want to delete this inquiry pickup?')) {
                $.ajax({
                    url: '/inquiry-valuation/' + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Inquiry Valuation deleted successfully!');
                        $('#valuationList #row-' + id)
                    .remove();
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the inquiry pickup.');
                    }
                });
            }
        }



// Function to open the inquiry pickup modal for Create & Update
function openInquiryPickup(type, inquiryAssignId) {
    if (type == "edit") {
        // If an ID is provided, it's an update
        $.ajax({
            url: '/inquiry-pickup/' + inquiryAssignId + '/edit',
            method: 'GET',
            success: function(data) {
                // Populate the modal with data for update
                $("#inquiryPickupModel #inquiry_assigned_id").val(data.id);
                $("#inquiryPickupModel #user_id").val(data.user_id);
                $("#inquiryPickupModel #schedule_date").val(data.schedule_date); // Set date correctly
                $("#inquiryPickupModel #status").val(data.status);
                $("#inquiryPickupModel #amount").val(data.amount);
                $("#inquiryPickupModel #description").val(data.description);

                // Change form action to update
                $("#inquiryPickupForm").attr('action', '/inquiry-pickup/' + data.id);
                $("#method").val('PUT'); // Set method to PUT for update

                // Close the list modal and show the form modal
                $('#inquiryPickupList').modal('hide');
                $('#inquiryPickupModel').modal('show');
            },
            error: function(xhr) {
                alert("An error occurred while fetching the inquiry pickup details.");
            }
        });
    } else {
        // It's a new inquiry pickup, reset the form
        $("#inquiryPickupForm").attr('action', "{{ route('inquiry-pickup.store') }}");
        $("#method").val('POST');
        $('#inquiryPickupModel').modal('show');
    }
}

// Clear modal when closed
$('#inquiryPickupModel').on('hidden.bs.modal', function() {
    $("#inquiryPickupForm")[0].reset(); // Reset form fields
    $("#inquiry_assigned_id").val('');
});

// Delete inquiry pickup
function deleteInquiryPickup(id) {
    if (confirm('Are you sure you want to delete this inquiry pickup?')) {
        $.ajax({
            url: '/inquiry-pickup/' + id,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Inquiry Pickup deleted successfully!');
                $('#inquiryPickupList #row-' + id).remove();
            },
            error: function(xhr) {
                alert('An error occurred while deleting the inquiry pickup.');
            }
        });
    }
}

// Function to open inquiry pickup list
function openInquiryPickupList(inquiryAssignId) {
    // Clear the input field and previous table content
    $("#inquiry_assigned_id").val(inquiryAssignId);
    $("#inquiryPickupList tbody").empty();

    // Fetch data and populate the modal
    $.ajax({
        url: '/inquiry-pickup/' + inquiryAssignId,
        method: 'GET',
        success: function(data) {
            data.forEach(function(entry) {
                // Format the schedule date as "Oct 30, 2024"
                let scheduleDate = new Date(entry.schedule_date);
                let formattedDate = scheduleDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });

                $("#inquiryPickupList tbody").append(`
                    <tr id="row-${entry.id}">
                        <td>${entry.user.name}</td>
                        <td>${formattedDate}</td>
                        <td>${entry.status}</td>
                        <td>${entry.amount}</td>
                        <td>
                             <div class="d-flex align-items-center">
                                <a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical ti-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                    <a href="javascript:;" class="dropdown-item" onclick="openInquiryPickup('edit', ${entry.id})">Edit</a>
                                    <a href="javascript:;" class="dropdown-item" onclick="deleteInquiryPickup(${entry.id})">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `);
            });

            // Show the modal
            $('#inquiryPickupList').modal('show');
        },
        error: function(xhr) {
            console.error("Failed to fetch inquiry pickup entries: ", xhr);
            alert("An error occurred while fetching the inquiry pickup entries.");
        }
    });
}

// Optional: Clear modal data when closed
$('#inquiryPickupList').on('hidden.bs.modal', function() {
    $("#inquiryPickupList tbody").empty();
});

    </script>
@endsection
