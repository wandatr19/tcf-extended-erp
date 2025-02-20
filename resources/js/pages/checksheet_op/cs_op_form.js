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


    $('.update-status').on('change', function() {
        var lineId = $(this).data('id');
        var status = $(this).val();
        console.log("Mengirim ID:", lineId);

        $.ajax({
            url: '/checksheet-op/update-checksheet',
            type: "PATCH",
            data: {
                id: lineId,
                status: status
            },
            success: function(response) {
                console.log("Status updated successfully!");
            },
            error: function(xhr) {
                console.log("Error updating status: ", xhr.responseText);
            }
        });
    });

    // Update description
    $('.update-desc').on('change', function() {
        var lineId = $(this).data('id');
        var description = $(this).val();

        console.log("Mengirim ID:", lineId);

        $.ajax({
            url: '/checksheet-op/update-checksheet',
            type: "PATCH",
            data: {
                id: lineId,
                description: description
            },
            success: function(response) {
                console.log("Description updated successfully!");
            },
            error: function(xhr) {
                console.log("Error updating description: ", xhr.responseText);
            }
        });
    });

    $('#submit-complete').on('click', function() {
        var headerId = $(this).data('id');
        console.log("Mengirim ID:", headerId);

        $.ajax({
            url: '/checksheet-op/' + headerId + '/complete',
            type: "PATCH",
            data: {
                id: headerId
            },
            success: function(response) {
                showToast({ title: response.message });
                window.location.href = '/checksheet-op/list-data';
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX Error:", textStatus, errorThrown);
                console.log("Response Text:", jqXHR.responseText);
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
            }
        });
    });


});