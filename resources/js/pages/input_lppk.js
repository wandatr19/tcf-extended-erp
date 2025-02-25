
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

    $('#partner').select2({
        ajax: {
            url:  '/lkh/get_partner',
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
    });

    $('#part_id').select2({
        ajax: {
            url:  '/lppk/get_part',
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
    });

    $('#part_id').on('change', function() {
        let partCode = $(this).val();
        
        if (partCode) {
            $.ajax({
                url: '/lppk/get_all_part/' + partCode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#part_name').val(data.name);
                    $('#part_code').val(data.value);
                    $('#part_desc').val(data.description);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    showToast({ icon: "error", title: jqXHR.responseJSON.message });
                },
            });
        }
    });


    function generateNoLppk() {
        const monthNames = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
        const date = new Date();
        const month = monthNames[date.getMonth()];
        const year = date.getFullYear().toString().slice(-2);

        $.ajax({
            url: '/lkh/get_last_no_lppk',
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                // const lastNumber = data.last_number + 1;
                // const noLppk = `LPPK/QC/${month}/${year}/${lastNumber}`;
                // $('#no_lppk').val(noLppk);
                let lastNumber = 0;
                if (data.last_number) {
                    const parts = data.last_number.split('/');
                    const lastMonth = parts[2];
                    const lastYear = parts[3];
                    if (lastMonth === month && lastYear === year) {
                        lastNumber = parseInt(parts[4], 10);
                    }
                }
                lastNumber += 1;
                const noLppk = `LPPK/QC/${month}/${year}/${lastNumber}`;
                $('#no_lppk').val(noLppk);
                },
            error: function (jqXHR, textStatus, errorThrown) {
                showToast({ icon: "error", title: "Failed to generate LPPK number" });
            },
        });
    }

    generateNoLppk();

    $('#form_lppk').on('submit', function (e) {
        e.preventDefault(); 
        loadingSwalShow();
        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                loadingSwalClose();
                showToast({ title: data.message });
                $('#form_lppk')[0].reset();
                $('#partner').val('').trigger('change'); 
                $('#part_name').val('').trigger('change'); 
                generateNoLppk(); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                loadingSwalClose();
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
                $('#form_lppk')[0].reset();
                generateNoLppk();
            },
        });
    });

});


