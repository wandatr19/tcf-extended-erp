document.querySelectorAll('#date, #shift, #line').forEach((element) => {
    element.addEventListener('change', () => {
        // Ambil nilai dari semua input
        const date = document.getElementById('date').value;
        const shift = document.getElementById('shift').value;
        const line = document.getElementById('line').value;

        // Validasi jika semua field telah diisi
        if (date && shift && line) {
            document.getElementById('filterForm').submit(); // Kirim form jika validasi terpenuhi
        }
    });
});