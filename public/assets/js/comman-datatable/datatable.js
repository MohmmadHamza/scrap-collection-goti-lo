var oTable;
$(document).ready(function () {
    var $controller = $("#common_datatable").attr("data-control");
    var data_id = $("#common_datatable").attr("data-id");
    var mathod = $("#common_datatable").attr("data-mathod");
    var sorting = $("#common_datatable").attr("data-sorting");
    var sorting_type = $("#common_datatable").attr("data-sorting-type");
    var serial_number = $("#common_datatable").attr("data-serial-number");
    var searchable = $("#common_datatable").attr("data-not-search");
    var extra_param = $("#common_datatable").attr("data-extra-param");
    var param_name = $("#common_datatable").attr("data-extra-param-name");
    var custom_btn = $("#common_datatable").attr("data-custom_btn_text");
    var data_page_legth = $("#common_datatable").attr("data-page-legth");
    var data_search_box = $("#common_datatable").attr("data-search-box");

    var data_call_controller = $("#common_datatable").attr(
        "data-call-controller"
    );

    var data_except_sorting_columns = $("#common_datatable").attr(
        "data-except-sorting-columns"
    );

    var column = $("#common_datatable").attr("data-column");
    var column_name = $("#common_datatable").attr("data-column-name");

    var custom_btn_arr = [];
    if (typeof custom_btn !== typeof undefined && custom_btn !== false) {
        custom_btn_arr = {
            text: custom_btn,
            className: "btn btn-primary copy_question",
            init: function (api, node, config) {
                $(node).removeClass("btn-default");
            },
        };
    }

    var dt_sort = [];
    if (!(typeof sorting !== typeof undefined && sorting !== false)) {
        dt_sort = [0, "desc"];
    } else {
        var sorting_arr = sorting.split(",");
        var sorting_type_arr = sorting_type.split(",");

        var $i = 0;
        $.each(sorting_arr, function (ke, va) {
            dt_sort[$i] = [va, sorting_type_arr[ke]];
            $i++;
        });
    }
    var default_page_legth = 10;
    if (data_page_legth !== "") {
        default_page_legth = data_page_legth;
    }
    var search_box = true;
    if (
        typeof data_search_box !== typeof undefined &&
        data_search_box !== false
    ) {
        search_box = false;
    }
    if (typeof mathod !== typeof undefined && mathod !== false) {
        var $url = mathod;

        if (data_id > 0) $url = $url + "/" + data_id;
    } else {
        var $url = "";
        if (data_id > 0) $url = "edit/" + data_id;
    }

    var $searchable = false;
    var $search = [0];
    if (typeof searchable !== typeof undefined && searchable !== false) {
        if (searchable != "") {
            var $search1 = searchable.split(",");

            $.grep(
                $search1,
                function (n, i) {
                    $search[i] = parseInt(n);
                },
                true
            );

            $searchable = false;
        }
    }
    var $orderable = true;
    var $targets = [];
    if (serial_number == 1) {
        $orderable = false;
        $targets.push(0);
    }

    if (
        typeof data_except_sorting_columns !== typeof undefined &&
        data_except_sorting_columns != ""
    ) {
        var split = data_except_sorting_columns.split(",");
        $.each(split, function (index, item) {
            $targets.push(parseInt(item));
        });
    }

    var $columns_data = [];
    if (typeof column_name !== typeof undefined && column_name != "") {
        var split = column_name.split(",");
        $.each(split, function (index, item) {
            if (index == 0 && item == "id") {
                if (typeof $("#common_datatable").data("hide-delete") !== "undefined" && $("#common_datatable").data("hide-delete").toString().toUpperCase() === "TRUE") {
                   
                    return true; 
                } else {
                $columns_data.push({
                    data: "id",
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<input class="form-check-input kt-check " type="checkbox" name="Checkboxes[' +
                            full.id +
                            ']" value="' +
                            full.id +
                            '">'
                        );
                    },
                    width: "50px",
                    className: "text-center",
                });
            }
            } else if (item == "status") {
                $columns_data.push({
                    data: "status",
                    render: function (data) {
                        if (data == 1) {
                            return "Active";
                        } else if (data == 0) {
                            return "Inactive";
                        }
                        return data;
                    },
                });
            // } else if (item == "actions") {
            //     $columns_data.push({
            //         data: "actions",
            //         orderable: false,
            //         width: "5%",
            //         className: "text-center",
            //         render: function (data, type, full, meta) {
            //             $return_string = "";
            //             $return_string += '<div class="dropdown">';
            //             $return_string +=
            //                 '<button class="btn p-0  hide-arrow" type="button" id="editDropdown${full.id}" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>';
            //             $return_string +=
            //                 '<ul class="dropdown-menu" aria-labelledby="editDropdown' +
            //                 full.id +
            //                 '">';
            //             $.each(data.links, function (ki, kva) {
            //                 if (kva.link != "") {
            //                     $return_string +=
            //                         '<li><a wire:navigate href="' +
            //                         kva.link +
            //                         '" class="dropdown-item"><i class="fa ' +
            //                         kva.icon +
            //                         ' me-1"></i> ' +
            //                         kva.title +
            //                         "</a></li>";
            //                 } else if (kva.link === "" && kva.data_target) {
            //                     $return_string +=
            //                         '<li><a wire:navigate href="" data-bs-toggle="modal" data-id='+kva.data_id+' data-bs-target="' +
            //                         kva.data_target +
            //                         '" class="dropdown-item"><i class="fa ' +
            //                         kva.icon +
            //                         ' me-1"></i> ' +
            //                         kva.title +
            //                         "</a></li>";
            //                 } else {
            //                     $return_string += '<li><a wire:navigate href="#" data-bs-toggle="modal" data-bs-target="' + kva.data_target + '" class="dropdown-item" onclick="' + kva.onclick + '"><i class="fa ' + kva.icon + ' me-1"></i> ' + kva.title + '</a></li>';

            //                     // $return_string +='<li><a wire:navigate href="" data-bs-toggle="modal" data-bs-target="' +kva.data_target +'" class="dropdown-item"><i class="fa ' +kva.icon +' me-1"></i> ' +kva.title +"</a></li>";
            //                 }
            //             });
            //             $return_string += "</ul></div>";
            //             return $return_string;
            //         },
            //     });
            } else {
                $columns_data.push({ data: item });
            }
        });
    }

    oTable = $("#common_datatable").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // dom: "<'row'><'row'<'col-md-6'lB><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        // scrollX: true,
        language: {
            paginate: {
                previous: '<i class="ti ti-chevron-left ti-sm"></i>',
                next: '<i class="ti ti-chevron-right ti-sm"></i>',
            },
             lengthMenu: "Show _MENU_ Entry",
            info: "Showing _START_ to _END_ of _TOTAL_ Entries"
        },
        responsive: true,
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
        lengthMenu: [10, 20, 50, 100, 200, 500],
        pageLength: 10,
        searchDelay: 500,

        ajax: {
            url: $controller,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: function (d) {
                if (
                    typeof extra_param !== typeof undefined &&
                    extra_param !== false
                ) {
                    if (extra_param != "") {
                        var extra_params = extra_param.split(",");
                        var param_names = param_name.split(",");
                        var $i = 0;
                        $.each(extra_params, function (ke, va) {
                            var keyName = param_names[ke];
                            d[keyName] = $("#" + va).val();
                        });
                    }
                }

                d._token = $('meta[name="csrf-token"]').attr("content");
            },
        },
        columns: $columns_data,
        order: [[sorting, sorting_type]],
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                });
        },
    });

    $(".datatable-input").on("change", function (e) {
        e.preventDefault();
        oTable.table().draw();
    });

    

    $('#kt_reset').on('click', function (e) {
        e.preventDefault();
        // Clear all the input values
        $('.datatable-input').val('').trigger('change');

        // Redraw the table to show all data again
        oTable.search('').columns().search('').draw();
    });   

    var add_new_info = $("#common_datatable").attr("data-add-new");
    var add_new_method = $("#common_datatable").attr("data-add-mathod");
    add_new_method =
        typeof add_new_method != "undefined" ? add_new_method : "add";
    if (typeof add_new_info != "undefined") {
        if ($("#common_datatable_length a.btn").length == 0) {
            var add_new_title = "Add";
            $("#common_datatable_length").append(
                '<a href="' +
                add_new_info +
                '" data-control="' +
                add_new_info +
                '" data-mathod="' +
                add_new_method +
                '" class="btn btn-primary" style="margin-left: 10px;"><i class="fa fa-plus"></i> ' +
                add_new_title +
                "</a>"
            );
        }
    }

    function toggleDeleteButton() {
        if ($("#common_datatable").find(".kt-check:checked").length > 0) {
            $("#kt_delete").show();
        } else {
            $("#kt_delete").hide();
        }
    }

    $("#common_datatable").on("change", ".kt-check", function () {
        toggleDeleteButton();
    });

    toggleDeleteButton();

    $("#checkAll").click(function () {
        if (this.checked) {
            $("#kt_delete").show();
        } else {
            $("#kt_delete").hide();
        }
        $("input:checkbox").not(this).prop("checked", this.checked);
    });

    $("#kt_delete").click(function () {
        var confirmation = confirm("Are you sure you want to delete the selected record(s)?");
    
        if (confirmation) {

        } else {
            return false;
        }
    });
    

    if ($("#success-message").length > 0) {
        $("#success-message").delay(3000).fadeOut("slow");
    }


    if ($("#error-message").length > 0) {
        $("#error-message").delay(3000).fadeOut("slow");
    }

    
});


function confirmDelete(URL) {
    var conf = confirm("Are you sure?");
    if (conf) {
        $.ajax({
            url: URL,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {},
         
            success: function (response) {
                
                $.NotificationApp.send(
                    "Well Done!",
                    response.message,
                    "top-right",
                    "rgba(0,0,0,0.2)",
                    "success",

                );

                oTable.table().draw();
            },
            error: function (xhr, status, error) {

                var errorMessage = 'An unexpected error occurred';
    
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.responseText) {
                    
                    errorMessage = xhr.responseText;
                }
                $.NotificationApp.send(
                    "Oh snap!",
                    errorMessage,
                    "top-right",
                    "rgba(0,0,0,0.2)",
                    "error"
                );

            },
        });
    }
}

