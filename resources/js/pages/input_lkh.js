// import $ from 'jquery';
// import 'select2';
// import 'select2/dist/css/select2.min.css';

$(function(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });

      $('#customer').select2({
        ajax: {
            url:  '/lkh/get_customer',
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

    $('#form-lkh').on('submit', function (e) {
        e.preventDefault(); // Prevent form submission

        // Ambil data form
        let formData = $(this).serialize();

        // Kirim data dengan AJAX
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function (response) {
                // Tampilkan notifikasi
                alert(response.message);

                // Redirect ke URL baru
                window.location.href = response.redirect_url;
            },
            error: function (xhr) {
                // Tangani error (misalnya validasi gagal)
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = Object.values(errors).flat().join('\n');
                    alert('Validation Error:\n' + errorMessages);
                } else {
                    alert('Terjadi kesalahan. Coba lagi nanti.');
                }
            }
        });
    });



    })





// Calculate total defect
document.addEventListener('DOMContentLoaded', function () {
    const hole_ta = document.getElementById('hole_ta');
    const hole_tembus = document.getElementById('hole_tembus');
    const hole_mencuat = document.getElementById('hole_mencuat');
    const hole_geser = document.getElementById('hole_geser');
    const hole_doubleprc = document.getElementById('hole_doubleprc');
    const hole_mengecil = document.getElementById('hole_mengecil');
    const neck = document.getElementById('neck');
    const crack_p = document.getElementById('crack_p');
    const glmbg_krpt = document.getElementById('glmbg_krpt');
    const trim_over = document.getElementById('trim_over');
    const trim_min = document.getElementById('trim_min');
    const trim_mencuat = document.getElementById('trim_mencuat');
    const bend_min = document.getElementById('bend_min');
    const bend_over = document.getElementById('bend_over');
    const emb_geser = document.getElementById('emb_geser');
    const double_emb = document.getElementById('double_emb');
    const penyok_defom = document.getElementById('penyok_defom');
    const krg_stamp = document.getElementById('krg_stamp');
    const marking_ta = document.getElementById('marking_ta');
    const material_s = document.getElementById('material_s');
    const baret_scratch = document.getElementById('baret_scratch');
    const dent = document.getElementById('dent');
    const others = document.getElementById('others');
    const total_defect = document.getElementById('part_reject');

    const calculateTotal  = () => {
        const total =
        (parseFloat(hole_ta.value) || 0) +
        (parseFloat(hole_tembus.value) || 0) +
        (parseFloat(hole_mencuat.value) || 0) +
        (parseFloat(hole_geser.value) || 0) +
        (parseFloat(hole_doubleprc.value) || 0) +
        (parseFloat(hole_mengecil.value) || 0) +
        (parseFloat(neck.value) || 0) +
        (parseFloat(crack_p.value) || 0) +
        (parseFloat(glmbg_krpt.value) || 0) +
        (parseFloat(trim_over.value) || 0) +
        (parseFloat(trim_min.value) || 0) +
        (parseFloat(trim_mencuat.value) || 0) +
        (parseFloat(bend_min.value) || 0) +
        (parseFloat(bend_over.value) || 0) +
        (parseFloat(emb_geser.value) || 0) +
        (parseFloat(double_emb.value) || 0) +
        (parseFloat(penyok_defom.value) || 0) +
        (parseFloat(krg_stamp.value) || 0) +
        (parseFloat(marking_ta.value) || 0) +
        (parseFloat(material_s.value) || 0) +
        (parseFloat(baret_scratch.value) || 0) +
        (parseFloat(dent.value) || 0) +
        (parseFloat(others.value) || 0);
    total_defect.value = total;
    };

    hole_ta.addEventListener('input', calculateTotal);
    hole_tembus.addEventListener('input', calculateTotal);
    hole_mencuat.addEventListener('input', calculateTotal);
    hole_geser.addEventListener('input', calculateTotal);
    hole_doubleprc.addEventListener('input', calculateTotal);
    hole_mengecil.addEventListener('input', calculateTotal);
    neck.addEventListener('input', calculateTotal);
    crack_p.addEventListener('input', calculateTotal);
    glmbg_krpt.addEventListener('input', calculateTotal);
    trim_over.addEventListener('input', calculateTotal);
    trim_min.addEventListener('input', calculateTotal);
    trim_mencuat.addEventListener('input', calculateTotal);
    bend_min.addEventListener('input', calculateTotal);
    bend_over.addEventListener('input', calculateTotal);
    emb_geser.addEventListener('input', calculateTotal);
    double_emb.addEventListener('input', calculateTotal);
    penyok_defom.addEventListener('input', calculateTotal);
    krg_stamp.addEventListener('input', calculateTotal);
    marking_ta.addEventListener('input', calculateTotal);
    material_s.addEventListener('input', calculateTotal);
    baret_scratch.addEventListener('input', calculateTotal);
    dent.addEventListener('input', calculateTotal);
    others.addEventListener('input', calculateTotal);

});

document.addEventListener('DOMContentLoaded', function () {
    const total_prod = document.getElementById('total_prod');
    const part_reject = document.getElementById('part_reject');
    const part_ok = document.getElementById('part_ok');

    let previousRejectValue = part_reject.value;

    const calculatePartOk = () => {
        const total = parseFloat(total_prod.value) || 0;
        const reject = parseFloat(part_reject.value) || 0;
        const ok = total - reject;
        part_ok.value = ok;
    };

    total_prod.addEventListener('input', calculatePartOk);

    setInterval(() => {
        if (part_reject.value !== previousRejectValue) {
            previousRejectValue = part_reject.value;
            calculatePartOk();
        }
    }, 100); // Cek setiap 100ms
});

