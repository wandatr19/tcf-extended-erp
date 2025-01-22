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


});