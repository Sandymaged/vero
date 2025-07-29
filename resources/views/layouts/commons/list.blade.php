<script>
    var yes_delete = '{{trans('messages.yes_delete')}}';
    var no_cancel = '{{trans('messages.no_cancel')}}';
    var are_you_want_delete = '{{trans('messages.are_you_want_delete')}}';
    var are_you_want_delete_selected = '{{trans('messages.are_you_want_delete_selected')}}';
    var you_have_deleted = '{{trans('messages.you_have_deleted')}}';
    var selected_was_deleted = '{{trans('messages.selected_was_deleted')}}';
    var you_have_deleted_selected = '{{trans('messages.you_have_deleted_selected')}}';
    var got_it = '{{trans('messages.got_it')}}';
    var not_deleted = '{{trans('messages.not_deleted')}}';
    var selected_not_deleted = '{{trans('messages.selected_not_deleted')}}';
</script>

<script>

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-customer-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');
                const deleteUrl = parent.getAttribute("href");
                // Get customer name
                const customerName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: are_you_want_delete + " " + customerName + "؟",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: yes_delete,
                    cancelButtonText: no_cancel,
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        deleteRow(parent, deleteUrl, customerName)

                        Swal.fire({
                            text: "You have deleted " + customerName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " " + not_deleted,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: got_it,
                            customClass: {confirmButton: "btn fw-bold btn-primary"}
                        });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[data-kt-customer-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            Swal.fire({
                text: are_you_want_delete_selected,
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: yes_delete,
                cancelButtonText: no_cancel,
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    deleteRows(checkboxes, datatable)
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: selected_was_deleted,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: got_it,
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    });
                }
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Define variables
        const toolbarBase = document.querySelector('[data-kt-customer-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-customer-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-customer-table-select="selected_count"]');

        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    var deleteRow = function (o, deleteUrl, n) {
        $.ajax(
            {
                url: deleteUrl,
                type: 'POST',
                dataType: "JSON",
                data: {
                    '_method': 'DELETE'
                }
            })
            .done(function (data) {
                Swal.fire({
                    text: you_have_deleted + " " + n + "!.",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: got_it,
                    customClass: {confirmButton: "btn fw-bold btn-primary"}
                }).then((function () {
                    t.row($(o)).remove().draw()
                }));
            })
            .fail(function (error) {
                Swal.fire({
                    text: n + " " + not_deleted,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: got_it,
                    customClass: {confirmButton: "btn fw-bold btn-primary"}
                });
            });
    }

    var deleteRows = function (e, t) {
        const ids = [];

        checkboxes.forEach(c => {
            if (c.checked && c.dataset.id) {
                ids.push(e.dataset.id);
            }
        });

        const deleteUrl = document.querySelector("#kt_customers_table").dataset.delete_url;

        $.ajax(
            {
                url: deleteUrl,
                type: 'POST',
                dataType: "JSON",
                data: {
                    '_method': 'DELETE',
                    ids
                }
            })
            .done(function (data) {
                Swal.fire({
                    text: you_have_deleted_selected,
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: got_it,
                    customClass: {confirmButton: "btn fw-bold btn-primary"}
                }).then((function () {
                    checkboxes.forEach(c => {
                        if (c.checked) {
                            datatable.row($(c.closest('tbody tr'))).remove().draw();
                        }
                    });
                    // Remove header checked box
                    const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                    headerCheckbox.checked = false;
                }));
            })
            .fail(function (error) {
                Swal.fire({
                    text: selected_not_deleted,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: got_it,
                    customClass: {confirmButton: "btn fw-bold btn-primary"}
                })
            });
    }


</script>
