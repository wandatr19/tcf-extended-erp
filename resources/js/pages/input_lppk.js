document.addEventListener("DOMContentLoaded", function () {
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
            // Simpan nomor surat hanya jika form disubmit
            saveNoSurat();
        });
    }
});

Dropzone.autoDiscover = false; // Nonaktifkan auto-discover

const dropzone = new Dropzone("#gambar_lppk", {
    url: "", // Endpoint sementara untuk upload file
    paramName: "file",
    maxFilesize: 2, // Maksimal ukuran file (MB)
    acceptedFiles: ".jpg,.jpeg,.png",
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    autoProcessQueue: false, // Proses manual
    addRemoveLinks: true,
    init: function() {
        const myDropzone = this;

        // Sinkronkan file Dropzone dengan form saat dikirim
        document.getElementById("form_lppk").addEventListener("submit", function(event) {
            event.preventDefault(); // Cegah submit default

            // Pastikan file di Dropzone diproses sebelum form dikirim
            if (myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue(); // Proses file
            } else {
                this.submit(); // Jika tidak ada file, kirim langsung
            }
        });

        // Submit form setelah semua file Dropzone berhasil diunggah
        myDropzone.on("queuecomplete", function() {
            document.getElementById("form_lppk").submit();
        });

        // Opsional: Tangani error
        myDropzone.on("error", function(file, errorMessage) {
            console.error(errorMessage);
        });
    }
});
