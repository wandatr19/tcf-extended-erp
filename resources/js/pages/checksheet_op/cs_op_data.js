$(function(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    let loadingSwal;
    function loadingSwalShow() {
        loadingSwal = Swal.fire({
            imageHeight: 300,
            showConfirmButton: false,
            title: '<i class="fas fa-sync-alt fa-spin fs-80"></i>',
            allowOutsideClick: false,
            background: 'rgba(0, 0, 0, 0)'
        });
    }

    function loadingSwalClose() {
        loadingSwal.close();
    }

    function showToast(options) {
        const toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000, 
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });

        toast.fire({
            icon: options.icon || "success",
            title: options.title
        });
    }

    var columnsTable = [
        { data: 'action'},
        { data: 'nama_operator'},
        { data: 'shift'},
        { data: 'line'},
        { data: 'nama_mesin'},
        { data: 'nama_karyawan'},
        { data: 'status'},
        { data: 'issued_at'},
    ];

    var csopTable = $('#table-checksheet-op').DataTable({
        search: {
            return: true,
        },
        order: [[0, "DESC"]],
        processing: true,
        serverSide: true,
        ajax: {
            url: "/checksheet-op/datatable",
            dataType: "json",
            type: "POST",
            data: function (dataFilter) {
                let filterDate = $("#filter_date").val();
                let filterShift = $("#filter_shift").val();
                let filterStatus = $("#filter_status").val();
                let filterMachine = $("#filter_machine").val();

                dataFilter.filter_date = filterDate;
                dataFilter.filter_shift = filterShift;
                dataFilter.filter_status = filterStatus;
                dataFilter.filter_machine = filterMachine;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.responseJSON.data) {
                    var error = jqXHR.responseJSON.data.error;
                } else {
                    var message = jqXHR.responseJSON.message;
                    var errorLine = jqXHR.responseJSON.line;
                    var file = jqXHR.responseJSON.file;
                }
            },
        },
        responsive: false,
        columns: columnsTable,
    });
    function refreshTable() {
        var searchValue = csopTable.search();
        if (searchValue) {
            csopTable.search(searchValue).draw();
        } else {
            csopTable.search("").draw();
        }
    }


    $('#machine_add').select2({
        ajax: {
            url: '/checksheet-op/get_machine',
            type: "post",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term || "",
                    page: params.page || 1,
                };
            },
            cache: true,
        },
        dropdownParent: $('#modal-add-checksheet')
    });

    $('#line_add').select2({
        ajax: {
            url: '/checksheet-op/get_homeline',
            type: "post",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term || "",
                    page: params.page || 1,
                };
            },
            cache: true,
        },
        dropdownParent: $('#modal-add-checksheet')
    });

    $('#operator_add').select2({
        ajax: {
            url: '/checksheet-op/get_operator',
            type: "post",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term || "",
                    page: params.page || 1,
                };
            },
            cache: true,
        },
        dropdownParent: $('#modal-add-checksheet')
    });

    $('#shift_add').select2({
        dropdownParent: $('#modal-add-checksheet')
    });

    $('#line_add').on('change', function() {
        let partCode = $(this).find(':selected').data('m_product_id');
        
        if (partCode) {
            $.ajax({
                url: '/lppk/get_all_part/' + partCode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#mesin_test').val(data.name);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    showToast({ icon: "error", title: jqXHR.responseJSON.message });
                },
            });
        }
    });

    $('#form-add-checksheet').on('submit', function (e) {
        e.preventDefault(); 
        loadingSwalShow();
        let formData = $(this).serialize();
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function (response) {
                let headerId = response.data;
                loadingSwalClose();
                showToast({ title: response.message });
                $('#form-add-checksheet')[0].reset();
                $('#line_add').val('').trigger('change'); 
                $('#machine_add').val('').trigger('change');
                closeModalAdd();
                window.location.href = '/checksheet-op/edit-checksheet/' + headerId; 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                loadingSwalClose();
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
                // $('#form-add-checksheet')[0].reset();
                // $('#line_add').val('').trigger('change'); 
                // $('#machine_add').val('').trigger('change');
                
            },
        });
    });



    var modalAddChecksheetOpt = {
        backdrop: true,
        keyboard: false,
    };

    var modalAddChecksheet = new bootstrap.Modal(
        document.getElementById("modal-add-checksheet"),
        modalAddChecksheetOpt
    );

    function openModalAdd() {
        modalAddChecksheet.show();
    }
    
    function closeModalAdd() {
        modalAddChecksheet.hide();
    }
    $('#add-checksheet').on('click', function(){
        openModalAdd();
    })


    function resetForm() {
        $('#prod_date').val('').trigger('change');
        $('#shift_add').val('').trigger('change');
        $('#machine_add').val('').trigger('change');
        $('#line_add').val('').trigger('change');
    }
    $('#reset_checksheet').on('click', function(){
        resetForm();
    })

    $('#prod_date').attr('min', new Date().toISOString().split('T')[0]);

    var modalFilterChecksheetOpt = {
        backdrop: true,
        keyboard: false,
    };

    var modalFilterChecksheet = new bootstrap.Modal(
        document.getElementById("modal-filter-checksheet"),
        modalFilterChecksheetOpt
    );

    function openModalFilter() {
        modalFilterChecksheet.show();
    }
    
    function closeModalFilter() {
        modalFilterChecksheet.hide();
    }
    $('#filter-checksheet').on('click', function(){
        openModalFilter();
    })

    $('#filter_shift, #filter_status').select2({
        dropdownParent: $('#modal-filter-checksheet')
    });

    $('#reset_filter').on('click', function(){
        $('#filter_date').val('').trigger('change');
        $('#filter_shift').val('').trigger('change');
        $('#filter_status').val('').trigger('change');
        $('#filter_machine').val('').trigger('change');
    });
    

    $('#submit_filter').on('click', function(){
        csopTable.search('').draw();
        closeModalFilter();
    });

    $('#filter_machine').select2({
        ajax: {
            url: '/checksheet-op/get_machine',
            type: "post",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term || "",
                    page: params.page || 1,
                };
            },
            cache: true,
        },
        dropdownParent: $('#modal-filter-checksheet')
    });




    
});