// document.addEventListener("DOMContentLoaded", function () {
//     const noSuratField = document.getElementById("no_lppk");
//     const form = document.querySelector("form"); // Seleksi form
    
//     // Data sementara untuk melacak nomor surat terakhir
//     let lastNumbers = JSON.parse(localStorage.getItem("lastNumbers")) || {};

//     // Fungsi untuk mendapatkan bulan dalam format Romawi
//     function getRomanMonth(month) {
//         const romanMonths = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
//         return romanMonths[month - 1];
//     }

//     // Fungsi untuk mendapatkan nomor surat tanpa mengubah nomor terakhir
//     function previewNoSurat() {
//         const today = new Date();
//         const month = today.getMonth() + 1; // Bulan mulai dari 0
//         const year = today.getFullYear().toString().slice(-2); // Ambil 2 digit terakhir tahun
//         const romanMonth = getRomanMonth(month);

//         // Tentukan kunci berdasarkan bulan dan tahun
//         const key = `${month}-${year}`;
        
//         // Tentukan nomor urut tanpa menyimpan
//         const currentNumber = (lastNumbers[key] || 0) + 1;

//         // Format nomor surat
//         const formattedNumber = String(currentNumber).padStart(3, "0");
//         return `LPPK/QC/${romanMonth}/${year}/${formattedNumber}`;
//     }

//     // Fungsi untuk menyimpan nomor surat baru
//     function saveNoSurat() {
//         const today = new Date();
//         const month = today.getMonth() + 1;
//         const year = today.getFullYear().toString().slice(-2);
//         const key = `${month}-${year}`;

//         // Update nomor urut terakhir
//         if (!lastNumbers[key]) {
//             lastNumbers[key] = 1;
//         } else {
//             lastNumbers[key]++;
//         }

//         // Simpan ke localStorage
//         localStorage.setItem("lastNumbers", JSON.stringify(lastNumbers));
//     }

//     // Tampilkan nomor surat di field tanpa menyimpan
//     if (noSuratField) {
//         noSuratField.value = previewNoSurat();
//     }

//     // Event listener pada form submit
//     if (form) {
//         form.addEventListener("submit", function (e) {
//             // Simpan nomor surat hanya jika form disubmit
//             saveNoSurat();
//         });
//     }
// });

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

    $('#part_name').select2({
        ajax: {
            url:  '/lkh/get_part',
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

    $('#form_lppk').on('submit', function (e) {
        // console.log(typeof Swal !== 'undefined' ? 'SweetAlert is loaded' : 'SweetAlert is not loaded');

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
                $('#form_lppk')[0].reset();
                $('#partner').val('').trigger('change'); 
                $('#part_name').val('').trigger('change'); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                loadingSwalClose();
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
                $('#form_lppk')[0].reset();
            },
        });
    });

    Dropzone.options.fileUpload = {
        url: '#',
        addRemoveLinks: true,
        accept: function(file) {
            let fileReader = new FileReader();
    
            fileReader.readAsDataURL(file);
            fileReader.onloadend = function() {
    
                let content = fileReader.result;
                $('#file').val(content);
                file.previewElement.classList.add("dz-success");
            }
            file.previewElement.classList.add("dz-complete");
        }
    }

    const noSuratField = document.getElementById("no_lppk");
    const form = document.querySelector("form"); // Seleksi form
    
    // Data sementara untuk melacak nomor surat terakhir
    let lastNumbers = JSON.parse(localStorage.getItem("lastNumbers")) || {};

    // Fungsi untuk mendapatkan bulan dalam format Romawi
    function getRomanMonth(month) {
        const romanMonths = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
        return romanMonths[month - 1];
    }

    // Fungsi untuk mendapatkan nomor surat tanpa mengubah nomor terakhir
    function previewNoSurat() {
        const today = new Date();
        const month = today.getMonth() + 1; // Bulan mulai dari 0
        const year = today.getFullYear().toString().slice(-2); // Ambil 2 digit terakhir tahun
        const romanMonth = getRomanMonth(month);

        // Tentukan kunci berdasarkan bulan dan tahun
        const key = `${month}-${year}`;
        
        // Tentukan nomor urut tanpa menyimpan
        const currentNumber = (lastNumbers[key] || 0) + 1;

        // Format nomor surat
        const formattedNumber = String(currentNumber).padStart(3, "0");
        return `LPPK/QC/${romanMonth}/${year}/${formattedNumber}`;
    }

    // Fungsi untuk menyimpan nomor surat baru
    function saveNoSurat() {
        const today = new Date();
        const month = today.getMonth() + 1;
        const year = today.getFullYear().toString().slice(-2);
        const key = `${month}-${year}`;

        // Update nomor urut terakhir
        if (!lastNumbers[key]) {
            lastNumbers[key] = 1;
        } else {
            lastNumbers[key]++;
        }

        // Simpan ke localStorage
        localStorage.setItem("lastNumbers", JSON.stringify(lastNumbers));
    }

    // Tampilkan nomor surat di field tanpa menyimpan
    if (noSuratField) {
        noSuratField.value = previewNoSurat();
    }

    // Event listener pada form submit
    if (form) {
        form.addEventListener("submit", function (e) {
            saveNoSurat();
        });
    }    
});


