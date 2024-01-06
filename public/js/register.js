$(document).ready(function () {
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
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "slideDown",
        hideMethod: "fadeOut",
    };

    $("form").validate({
        rules: {
            namadepan: "required",
            namabelakang: "required",
            nomorponsel: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 13,
            },
            email: {
                required: true,
                email: true,
                customEmail: true,
            },
            password: {
                required: true,
                minlength: 8,
                strongPassword: true,
            },
            verfikasipassword: {
                required: true,
                equalTo: "#password",
            },
        },

        messages: {
            namadepan: "Nama depan harus di isi",
            namabelakang: "Nama belakang harus di isi",
            nomorponsel: {
                required: "Nomor harus di isi !",
                digits: "Hanya angka yang diperbolehkan",
                minlength: "Panjang nomor minimal 10 digit",
                maxlength: "Panjang nomor maksimal 13 digit",
            },
            email: {
                required: "Email harus di isi !",
                customEmail: "Format email tidak valid",
            },
            password: {
                required: "Password harus di isi !",
                strongPassword:
                    "Password harus memiliki minimal panjang 8 dan harus ada huruf besar, huruf kecil, dan angka",
            },
            verfikasipassword: {
                required: "Verifikasi email harus di isi !",
                equalTo: "Verifikasi password tidak sesuai",
            },
        },
        submitHandler: function (form) {
            // Proses formulir setelah lolos validasi
            // Tampilkan pesan toast "Akun Berhasil Dibuat"


            // Tunggu hingga toast selesai ditampilkan

                // Proses formulir setelah toast selesai ditampilkan
                form.submit();

        },
        errorPlacement: function (error, element) {
            // Tampilkan pesan kesalahan dalam toast
            toastr.error(error.text());
        },

        onfocusout: false,
        onkeyup: false,
    });

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

    $.validator.addMethod(
        "strongPassword",
        function (value, element) {
            return (
                this.optional(element) ||
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(value)
            );
        },
        "Password harus memiliki minimal panjang 8 dan harus ada huruf besar, huruf kecil, dan angka"
    );
});
