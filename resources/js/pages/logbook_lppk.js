$(function(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //   console.log('koncol');

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
        { data: 'part_name' },
        { data: 'problem_desc'},
        { data: 'no_lppk'},
        { data: 'issued_date'},
        { data: 'deadline_date'},
        { data: 'status_doc'},
        { data: 'issued_by'},
        { data: 'action'},
    ];

    var logbookTable =
    $("#table-logbook-lppk").DataTable({
        search: {
            return: true,
        },
        order: [[0, "ASC"]],
        processing: true,
        serverSide: true,
        ajax: {
            url:  "/lppk/datatable",
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
        responsive: true,
        columns: columnsTable,
    });

    var modalLogbookOptions = {
        backdrop: true,
        keyboard: false,
    };

    var modalLogbook = new bootstrap.Modal(
        document.getElementById("modal-logbook-lppk"),
        modalLogbookOptions
    );

    function openModalLogbook() {
        modalLogbook.show();
    }
    
    function closeModalLogbook() {
        // $('#product_id_add').val('').trigger('change');
        modalLogbook.hide();
    }

    $('.btnCloseEdit').on("click", function (){
        closeModalLogbook();
    })
    $('#close_modal').on("click", function (){
        closeModalLogbook();
    })

    $('#table-logbook-lppk').on('click', '.btnOpen', function (){
        var idLPPK = $(this).data('id');
        var noLPPK = $(this).data('no-lppk');
        var partCode = $(this).data('part-code');
        var partName = $(this).data('part-name');
        var partDesc = $(this).data('part-desc');
        var quantity = $(this).data('quantity');
        var problemDesc = $(this).data('problem-desc');
        var problemType = $(this).data('problem-type');

        $('#id_lppk').val(idLPPK);
        $('#no_lppk').val(noLPPK);
        $('#part_code').val(partCode);
        $('#part_name').val(partName);
        $('#part_type').val(partDesc);
        $('#quantity').val(quantity);
        $('#problem_desc').val(problemDesc);
        $('#problem_type').val(problemType);

        openModalLogbook();
    });

    $('#form-input-progress').on('submit', function (e){
        e.preventDefault();
        loadingSwalShow();
        let idLPPK = $('#id_lppk').val();
        let url = base_url + '/lppk/input_repair/' + idLPPK;

        var formData = new FormData($('#form-input-progress')[0]);
        $.ajax({
            url: url,
            data: formData,
            method:"POST",
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                loadingSwalClose();
                closeEditSto();
                showToast({ title: data.message });
                refreshTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                loadingSwalClose();
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
            },
        })
    });




});