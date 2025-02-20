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
        { data: 'doc_number'},
        { data: 'shift'},
        { data: 'nama_mesin'},
        { data: 'nama_karyawan'},
        { data: 'status'},
        { data: 'issued_at'},
        { data: 'action'},
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

    $('#form-add-checksheet').on('submit', function (e) {
        e.preventDefault(); 
        loadingSwalShow();
        let formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function (data) {
                loadingSwalClose();
                showToast({ title: data.message });
                $('#form-add-checksheet')[0].reset();
                $('#line_add').val('').trigger('change'); 
                $('#machine_add').val('').trigger('change'); 
                closeModal();
                refreshTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                loadingSwalClose();
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
                $('#form-add-checksheet')[0].reset();
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

    function openModal() {
        modalAddChecksheet.show();
    }
    
    function closeModal() {
        modalAddChecksheet.hide();
    }
    $('#add-checksheet').on('click', function(){
        openModal();
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

    
});