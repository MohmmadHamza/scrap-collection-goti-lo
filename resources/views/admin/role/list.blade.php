@extends('admin.main-template.main-template')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
     
        <div class="container-xxl flex-grow-1 container-p-y">

            @include('admin.elements.alert')
            <h4 class="mb-1">Roles List</h4>

            <p class="mb-6">A role provided access to predefined menus and features so that depending on <br> assigned role
                an administrator can have access to what user needs.</p>
            <!-- Role cards -->
            <div class="row g-6">
                @foreach ($roles as $role)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="fw-normal mb-0 text-body">Total {{ $roleUserCounts[$role->id] }} users</h6>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach ($roleUserDetails[$role->id] as $user)
                                            @if ($user['image'])
                                                <!-- Check if the image URL exists -->
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" title="{{ $user['name'] }}"
                                                    class="avatar pull-up">
                                                    <img class="rounded-circle"
                                                        src="{{ asset('assets/' . $user['image']) }}" alt="Avatar">
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="role-heading">
                                        <h5 class="mb-1">{{ $role->name }}</h5>

                                        <a href="javascript:;" data-role-id="{{ $role->id }}"
                                            data-role-name="{{ $role->name }}" data-bs-toggle="modal"
                                            data-bs-target="#addRoleModal" class="role-edit-modal">
                                            <i class="ti ti-edit ti-md text-heading"></i>
                                        </a>

                                    </div>
                                    <a href="javascript:void(0);" onclick="confirmDeleteRole({{ $role->id }})">
                                        <i class="ti ti-trash ti-md text-heading"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="row h-100">
                            <div class="col-sm-5">
                                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-4">
                                    <img src="../../assets/img/illustrations/add-new-roles.png"
                                        class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                        class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role">Add New Role</button>
                                    <p class="mb-0"> Add new role, <br> if it doesn't exist.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!--/ Role cards -->


            <!-- Add Role Modal -->
            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-6">
                                <h4 class="role-title mb-2">Add New Role</h4>
                                <p>Set role permissions</p>
                            </div>
                            <!-- Add role form -->
                            <form id="addRoleForm" class="row g-6" onsubmit="return false">
                                <input type="hidden" id="roleId" name="roleId" value="">
                                <div class="col-12">
                                    <label class="form-label" for="modalRoleName">Role Name</label>
                                    <input type="text" id="modalRoleName" name="modalRoleName" class="form-control"
                                        placeholder="Enter a role name" tabindex="-1" />
                                </div>
                                <div class="col-12">
                                    <h5 class="mb-6">Role Permissions</h5>
                                    <!-- Permission table -->
                                    <div class="table-responsive">
                                        <table class="table table-flush-spacing">
                                            <tbody>
                                                <tr>
                                                    <td class="text-nowrap fw-medium text-heading">Administrator Access <i
                                                            class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <div class="d-flex justify-content-end">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="selectAll" />
                                                                <label class="form-check-label" for="selectAll">
                                                                    Select All
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @foreach ($permissions as $group => $groupPermissions)
                                                    <tr>
                                                        <td class="text-nowrap fw-medium text-heading">{{ $group }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">
                                                                @foreach ($groupPermissions as $index => $permission)
                                                                    <div
                                                                        class="form-check {{ $index == count($groupPermissions) - 1 ? 'mb-0' : 'mb-0 me-4 me-lg-12' }}">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="permissions[]"
                                                                            value="{{ $permission->id }}"
                                                                            id="perm-{{ $permission->id }}" />
                                                                        <label class="form-check-label"
                                                                            for="perm-{{ $permission->id }}">
                                                                            {{ $permission->name }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Permission table -->
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" id="submitRoleForm"
                                        class="btn btn-primary me-3">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                            <!--/ Add role form -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add Role Modal -->



            <!-- /Confirm option section -->

            <!-- / Add Role Modal -->
        </div>





        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


        <script>
            "use strict";

            document.addEventListener("DOMContentLoaded", function(e) {
                // Initialize form validation
                FormValidation.formValidation(document.getElementById("addRoleForm"), {
                    fields: {
                        modalRoleName: {
                            validators: {
                                notEmpty: {
                                    message: "Please enter role name"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap5: new FormValidation.plugins.Bootstrap5({
                            eleValidClass: "",
                            rowSelector: ".col-12"
                        }),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        autoFocus: new FormValidation.plugins.AutoFocus()
                    }
                });

                const selectAll = document.querySelector("#selectAll");
                const checkboxes = document.querySelectorAll('[type="checkbox"]');
                selectAll.addEventListener("change", (event) => {
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = event.target.checked;
                    });
                });

                // Handle modal operations for editing and adding roles
                // Handle modal operations for editing and adding roles
            document.querySelectorAll('.role-edit-modal').forEach(function(editButton) {
                editButton.addEventListener('click', function() {
                    const roleId = this.getAttribute('data-role-id');
                    const roleName = this.getAttribute('data-role-name');
                    
                    // Set form fields with role data
                    document.getElementById('roleId').value = roleId;
                    document.getElementById('modalRoleName').value = roleName;

                    // Fetch current permissions for the role
                    axios.get(`/role/${roleId}/edit`)
                        .then(response => {
                            // Uncheck all checkboxes first
                            document.querySelectorAll('[type="checkbox"][name="permissions[]"]')
                                .forEach(checkbox => {
                                    checkbox.checked = false; // Uncheck all permissions first
                                });

                            // Check the checkboxes for the permissions the role has
                            response.data.permissions.forEach(permission => {
                                const checkbox = document.getElementById(`perm-${permission.id}`);
                                if (checkbox) {
                                    checkbox.checked = true; // Check the permission checkboxes
                                }
                            });

                            // Update Select All checkbox based on individual permissions
                            updateSelectAllCheckbox();
                        })
                        .catch(error => {
                            console.error('Error fetching permissions:', error);
                        });

                    // Change modal title
                    document.querySelector('.role-title').textContent = 'Edit Role';
                    document.getElementById('submitRoleForm').textContent = 'Update Role';
                });
            });

            // Function to update Select All checkbox state
            function updateSelectAllCheckbox() {
                const checkboxes = document.querySelectorAll('[type="checkbox"][name="permissions[]"]');
                const selectAllCheckbox = document.getElementById('selectAll');

                // Check if all individual checkboxes are checked
                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                selectAllCheckbox.checked = allChecked; // Set Select All checkbox state
            }

            // Event listener for Select All checkbox
            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('[type="checkbox"][name="permissions[]"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked; // Check or uncheck all based on Select All state
                });
            });



                // Clear form fields for adding a new role
                document.querySelector('.add-new-role').addEventListener('click', function() {
                    document.getElementById('roleId').value = ''; // Clear hidden input
                    document.getElementById('modalRoleName').value = ''; // Clear role name
                    // Clear permissions checkboxes or select inputs
                    const permissionCheckboxes = document.querySelectorAll('input[name="permissions[]"]');
                    permissionCheckboxes.forEach(checkbox => {
                        checkbox.checked = false; // Uncheck all checkboxes
                    });

                    // Change modal title and button text
                    document.querySelector('.role-title').textContent = 'Add New Role';
                    document.getElementById('submitRoleForm').textContent = 'Submit';
                });

                // Handle form submission for both Add and Edit Role
                document.getElementById('submitRoleForm').addEventListener('click', function(e) {
                    e.preventDefault();
                    const roleId = document.getElementById('roleId').value;
                    const roleName = document.getElementById('modalRoleName').value;

                    // Gather selected permissions
                    const selectedPermissions = [];
                    const permissionCheckboxes = document.querySelectorAll(
                        'input[name="permissions[]"]:checked');
                    permissionCheckboxes.forEach(checkbox => {
                        selectedPermissions.push(checkbox.value); // Get the value of checked checkboxes
                    });

                    // Validate role name before proceeding
                    const form = FormValidation.formValidation(document.getElementById("addRoleForm"));
                    form.validate().then(function(status) {
                        if (status === 'Valid') {
                            if (roleId) {
                                // Edit role: Update an existing role via AJAX
                                updateRole(roleId, roleName, selectedPermissions);
                            } else {
                                // Add role: Create a new role via AJAX
                                addRole(roleName, selectedPermissions);
                            }
                        }
                    });
                });

                function addRole(roleName, permissions) {
                    axios.post('/role', {
                            name: roleName,
                            permissions: permissions // Include permissions in the request
                        })
                        .then(response => {
                            // Use SweetAlert for success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Role Added!',
                                text: 'Role added successfully!',
                                customClass: {
                                    confirmButton: "btn btn-success waves-effect waves-light",
                                },
                            }).then(() => {
                                location.reload(); // Reload page to update the list of roles
                            });
                        })
                        .catch(error => {
                            console.error('Error adding role:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while adding the role.',
                                customClass: {
                                    confirmButton: "btn btn-danger waves-effect waves-light",
                                },
                            });
                        });
                }


                function updateRole(roleId, roleName) {
                    axios.put(`/role/${roleId}`, {
                            name: roleName,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated!',
                                text: response.data.message || 'Role updated successfully',
                                customClass: {
                                    confirmButton: "btn btn-success waves-effect waves-light",
                                },
                            }).then(() => {
                                location.reload(); // Reload page to update the list of roles
                            });
                        })
                        .catch(error => {
                            if (error.response && error.response.data.errors) {
                                const errors = error.response.data.errors;
                                let errorMessage = 'Error updating role:\n';
                                for (const field in errors) {
                                    errorMessage += `${errors[field].join(', ')}\n`;
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: errorMessage,
                                    customClass: {
                                        confirmButton: "btn btn-danger waves-effect waves-light",
                                    },
                                });
                            } else {
                                console.error('Error updating role:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while updating the role.',
                                    customClass: {
                                        confirmButton: "btn btn-danger waves-effect waves-light",
                                    },
                                });
                            }
                        });
                }
            });

            // Confirmation dialog for deleting roles
            "use strict";

            function confirmDeleteRole(roleId) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    customClass: {
                        confirmButton: "btn btn-primary me-3 waves-effect waves-light",
                        cancelButton: "btn btn-label-secondary waves-effect waves-light",
                    },
                    buttonsStyling: false,
                }).then(function(result) {
                    if (result.value) {
                        axios.delete(`/role/${roleId}`, {
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
                                }
                            })
                            .then(response => {
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: "The role has been deleted successfully.",
                                    customClass: {
                                        confirmButton: "btn btn-success waves-effect waves-light",
                                    },
                                }).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: "An error occurred while deleting the role.",
                                    customClass: {
                                        confirmButton: "btn btn-danger waves-effect waves-light",
                                    },
                                });
                            });
                    }
                });
            }
        </script>
        <!-- / Content -->
    @endsection
