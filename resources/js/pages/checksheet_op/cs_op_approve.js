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
        { data: 'nama_operator'},
        { data: 'shift'},
        { data: 'line'},
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

    $('.btnApprov').on('click', function() {
        var headerId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to approve this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
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
            }
        });
    });
    
    // $('#table-checksheet-op').on('click', '.btnApprove', function() {
    //     var headerId = $(this).data('id');
    //     console.log("Mengirim ID:", headerId);

    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "Do you want to approve this item?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, approve it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: '/checksheet-op/' + headerId + '/approved',
    //                 type: "PATCH",
    //                 data: {
    //                     id: headerId
    //                 },
    //                 success: function(response) {
    //                     showToast({ title: response.message });
    //                     refreshTable();
    //                 },
    //                 error: function(jqXHR, textStatus, errorThrown) {
    //                     showToast({ icon: "error", title: jqXHR.responseJSON.message });
    //                 }
    //             });
    //         }
    //     });
    // });

    $('#table-checksheet-op').on('click', '.btnDelete', function() {
        var headerId = $(this).data('id');
        console.log("Mengirim ID:", headerId);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/checksheet-op/' + headerId + '/delete',
                    type: "DELETE",
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
            }
        });
    });
    var modalDetailChecksheetOpt = {
        backdrop: true,
        keyboard: false,
    };

    var modalDetailChecksheet = new bootstrap.Modal(
        document.getElementById("modal-detail-checksheet"),
        modalDetailChecksheetOpt
    );

    function openModalDetail() {
        modalDetailChecksheet.show();
    }
    
    function closeModalDetail() {
        modalDetailChecksheet.hide();
    }
    $('#table-checksheet-op').on('click', '.btnDetail', function(){
        let id = $(this).data("id");
        $.ajax({
            url: '/checksheet-op/get-detail', 
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                $('#modal-detail-checksheet .btnApprov').attr('data-id', id);
                if (response.success) {
                    $("#detail-checksheet tbody").html('');
    
                    response.data.forEach(function (item) {
                        console.log("Response Data:", item.id_cs_op_header);
                        let statusColor = item.status === 'OK' ? 'success' : (item.status === 'NG' ? 'danger' : 'info');
                        let row = `
                            <tr>
                                <td>${item.pointspv ? item.pointspv.order_no : '-'}</td>
                                <td>${item.pointspv ? item.pointspv.name : '-'}</td>
                                <td>${item.group_shift ? item.group_shift.time : '-'}</td>
                                <td>${item.checked_at ? new Date(item.checked_at).toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' }) : '-'}</td>
                                <td><span class="badge badge-pill badge-${statusColor}">${item.status ? item.status : '-'}</span></td>
                                <td>${item.description ? item.description : '-' }</td>
                            </tr>
                        `;
                        $("#detail-checksheet tbody").append(row);
                    });
                    
                    $("#modal-detail-checksheet").modal("show");
                    
                } else {
                    alert("Data tidak ditemukan!");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
            }
        });
    })

    $('#table-checksheet-op').on('click', '.btnExport', function(){
        let id = $(this).data("id");
        window.open(`/checksheet-op/export-pdf/${id}`, '_blank');
    })

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

    $('#filter_shift, #filter_status').select2({
        dropdownParent: $('#modal-filter-checksheet')
    });

    $('#filter-checksheet').on('click', function(){
        openModalFilter();
    })

    $('#reset-table').on('click', function(){
        refreshTable();
    });

    $('#submit_filter').on('click', function(){
        csopTable.search('').draw();
        closeModalFilter();
    });
    
    $('#reset_filter').on('click', function(){
        $('#filter_date').val('').trigger('change');
        $('#filter_shift').val('').trigger('change');
        $('#filter_status').val('').trigger('change');
        $('#filter_machine').val('').trigger('change');
    });





});