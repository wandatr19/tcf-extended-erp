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
            url: "/checksheet-op/datatable-approve",
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
    
    $('#table-checksheet-op').on('click', '.btnApprove',function() {
        var headerId = $(this).data('id');
        console.log("Mengirim ID:", headerId);

        $.ajax({
            url: '/checksheet-op/' + headerId + '/approved',
            type: "PATCH",
            data: {
                id: headerId
            },
            success: function(response) {
                showToast({ title: response.message });
                refreshTable();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
            }
        });
    });

});