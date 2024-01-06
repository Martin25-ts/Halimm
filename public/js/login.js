$(document).ready(function() {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "2500",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "slideDown",
        hideMethod: "fadeOut",
    };

    $.validator.addMethod(
        "customEmail",
        function (value, element) {
            return (
                this.optional(element) ||
                /^[a-zA-Z0-9.]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value)
            );
        },
        "Format email tidak valid"
    );

    $("#loginForm").validate({
        rules: {
            username: {
                required: true,
                customUsernameValidation: true
            },
            password: "required"
        },
        messages: {
            username: {
                required: "Silakan masukkan email atau ponsel",
                customUsernameValidation: "Format email atau ponsel tidak valid"
            },
            password: "Silakan masukkan password"
        },

        errorPlacement: function (error, element) {
            // Menampilkan pesan kesalahan menggunakan Toastr

            toastr.error(error.text(), "Error");



        },
        submitHandler: function (form) {
            // Formulir valid, bisa dikirimkan ke server
            // toastr.success("Anda Berhasil Login :) <br>Akan di alihkan ke dashboard");


                form.submit();

        },

        onfocusout: false,
        onkeyup: false,
    });

    // Menambahkan metode kustom untuk validasi username
    $.validator.addMethod("customUsernameValidation", function(value, element) {
        // Memeriksa apakah username adalah nomor telepon
        if (/^\d+$/.test(value)) {
            // Jika nomor telepon, harus memiliki panjang 10-13 dan dimulai dari 0
            return value.length >= 10 && value.length <= 13 && value.startsWith('0');
        }

        // Memeriksa apakah username adalah email
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            // Jika email, validasi karakter khusus
            return !/[&=_'+\-,<>]+|\.{2,}/.test(value);
        }

        // Jika bukan nomor telepon atau email, kembalikan false
        return false;
    }, "Format email atau ponsel tidak valid");
});
