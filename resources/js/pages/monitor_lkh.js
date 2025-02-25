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
        { data: 'customer'},
        { data: 'part_no'},
        { data: 'hole_ta'},
        { data: 'hole_tembus'},
        { data: 'hole_mencuat'},
        { data: 'hole_geser'},
        { data: 'hole_doubleprc'},
        { data: 'hole_mengecil'},
        { data: 'neck'},
        { data: 'crack_p'},
        { data: 'glmbg_krpt'},
        { data: 'trim_over'},
        { data: 'trim_min'},
        { data: 'trim_mencuat'},
        { data: 'bend_min'},
        { data: 'bend_over'},
        { data: 'emb_geser'},
        { data: 'double_emb'},
        { data: 'penyok_defom'},
        { data: 'krg_stamp'},
        { data: 'material_s'},
        { data: 'baret_scratch'},
        { data: 'dent'},
        { data: 'others'},
        { data: 'dies_process'},
        { data: 'time_start'},
        { data: 'time_finish'},
        { data: 'sampling'},
        { data: 'total_prod'},
        { data: 'part_ok'},
        { data: 'part_repair'},
        { data: 'part_reject'},
        { data: 'verifikasi'},
    ];

    var lkhTable = $('#table-lkh').DataTable({
        search: {
            return: true,
        },
        order: [[0, "DESC"]],
        processing: true,
        serverSide: true,
        ajax: {
            url: "/lkh/datatable",
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
        var searchValue = lkhTable.search();
        if (searchValue) {
            lkhTable.search(searchValue).draw();
        } else {
            lkhTable.search("").draw();
        }
    }

    var modalFilterLKHOpt = {
        backdrop: true,
        keyboard: false,
    };

    var modalFilterLKH = new bootstrap.Modal(
        document.getElementById("modal-filter-lkh"),
        modalFilterLKHOpt
    );

    function openModal() {
        modalFilterLKH.show();
    }
    
    function closeModal() {
        modalFilterLKH.hide();
    }
    $('#filter-lkh').on('click', function(){
        openModal();
    })




});