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
        { data: 'name'},
        { data: 'nik'},
        { data: 'email'},
        { data: 'organization'},
        { data: 'division'},
        { data: 'department'},
        { data: 'section'},
        { data: 'position'},
        { data: 'action'},

    ];

    var userTable = $('#table-data-user').DataTable({
        search: {
            return: true,
        },
        order: [[0, "DESC"]],
        processing: true,
        serverSide: true,
        ajax: {
            url: "/master-user/datatable",
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

    $('#org_add').select2({
        ajax: {
            url: '/master-user/get-org',
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
        dropdownParent: $('#modal-add-user')
    });
    $('#div_add').select2({
        ajax: {
            url: '/master-user/get-div',
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
        dropdownParent: $('#modal-add-user')
    });
    $('#dept_add').select2({
        ajax: {
            url: '/master-user/get-dept',
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
        dropdownParent: $('#modal-add-user')
    });
    $('#section_add').select2({
        ajax: {
            url: '/master-user/get-section',
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
        dropdownParent: $('#modal-add-user')
    });
    $('#position_add').select2({
        ajax: {
            url: '/master-user/get-position',
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
        dropdownParent: $('#modal-add-user')
    });

    var modalAddUserOpt = {
        backdrop: true,
        keyboard: false,
    };

    var modalAddUser = new bootstrap.Modal(
        document.getElementById("modal-add-user"),
        modalAddUserOpt
    );

    function openAdd() {
        modalAddUser.show();
    }
    
    function closeModal() {
        modalAddUser.hide();
    }
    $('#add-user').on('click', function(){
        openAdd();
    })

    function resetAdd() {
        $('#form-add-user')[0].reset();
        $('#org_add').val('').trigger('change');
        $('#div_add').val('').trigger('change');
        $('#dept_add').val('').trigger('change');
        $('#section_add').val('').trigger('change');
        $('#position_add').val('').trigger('change');
    }
    $('#reset_add').on('click', function(){
        resetAdd();
    })

    var modalEditUserOpt = {
        backdrop: true,
        keyboard: false,
    };

    var modalEditUser = new bootstrap.Modal(
        document.getElementById("modal-edit-user"),
        modalEditUserOpt
    );

    function openEdit() {
        modalEditUser.show();
    }
    
    function closeModal() {
        modalEditUser.hide();
    }

    //EDIT USER
    $('#table-data-user').on('click', '.btnEdit', function (){
        var idUser = $(this).data('id');
        var name = $(this).data('user-name');
        var email = $(this).data('user-email');
        var nik = $(this).data('user-nik');
        $('#id_user_edit').val(idUser);
        $('#name_edit').val(name);
        $('#email_edit').val(email);
        $('#nik_edit').val(nik);
        openEdit();
    });







});
