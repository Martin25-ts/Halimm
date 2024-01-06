@extends('Layout.main')


@section('title', 'Ellocker | Register')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/register.css') }} ">
@endpush

@push('js-content')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
@endpush

@section('content')
    <header class="image-header">
        <img src="https://ucarecdn.com/36f1e9fd-0dbd-4a1c-be32-019e2171b0da/-/preview/500x500/-/quality/smart/-/format/auto/" alt="">
    </header>

    <main class="form-content">
        <form action="{{ route('addUser') }}" method="POST">
            @csrf
            <div class="inputGroup">
                <input name="namadepan" autocomplete="off" required="" type="text">
                <label for="namadepan">Nama Depan</label>
            </div>

            <div class="inputGroup">
                <input name="namabelakang" autocomplete="off" required="" type="text">
                <label for="namabelakang">Nama Belakang</label>
            </div>

            <div class="inputGroup">
                <input name="nomorponsel" autocomplete="off" required="" type="text">
                <label for="nomorponsel">Nomor Ponsel</label>
            </div>

            <div class="inputGroup">
                <input name="email" autocomplete="off" required="" type="text">
                <label for="email">Email</label>
            </div>

            <div class="inputGroup">
                <input name="password" id="password" autocomplete="off" required="" type="password">
                <label for="password">Password</label>
            </div>

            <div class="inputGroup">
                <input name="verfikasipassword" autocomplete="off" required="" type="password">
                <label for="verfikasipassword">Verifikasi Password</label>
            </div>

            <button type="submit" class="mt-3 mb-2 w-100 p-2 border-0">Daftar</button>
            <div class="register">
                <span>Sudah punya akun? <a href="{{ route('log') }}" class="text-decoration-none"><b>Login!</b></a></span>
            </div>
        </form>
    </main>
@endsection
