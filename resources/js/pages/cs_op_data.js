$(function(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('#table-checksheet-op').DataTable({
        processing: true,
        serverSide: false,
        // ajax: '/your-ajax-endpoint',
    });

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


    function resetFilter() {
        $('#locator_filter').val('').trigger('change');
        $('#org_id_filter').val('').trigger('change');
        $('#part_filter').val('').trigger('change');
    }

    
});