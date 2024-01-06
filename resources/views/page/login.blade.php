@extends('Layout.main')


@section('title', 'Ellocker | Login')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/login.css') }} ">
@endpush


@push('js-content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @elseif (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
@endpush

@section('content')
    <header class="image-header">
        <img src="https://ucarecdn.com/36f1e9fd-0dbd-4a1c-be32-019e2171b0da/-/preview/500x500/-/quality/smart/-/format/auto/"
            alt="">
    </header>


    <main class="form-content">
        <form action="{{ route('authlog') }}" method="POST" id="loginForm">
            @csrf
            <div class="inputGroup">
                <input name="username" id="username" autocomplete="off" required="" type="text" value={{Cookie::get('username') !== null ? Cookie::get('username') : ""}}>
                <label for="username">Email atau Ponsel</label>
            </div>

            <div class="inputGroup">
                <input name="password" id="password" autocomplete="off" required="" type="password" value={{Cookie::get('password') !== null ? Cookie::get('password') : ""}}>
                <label for="password">Password</label>
            </div>

            <div class="action-login d-flex justify-content-between m-0">
                <div class="remeberme-action">
                    <input type="radio" name="remember" id="remember" checked={{Cookie::get('username') !== null}}>
                    <label for="remember" >Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="" class="text-decoration-none"><b>Lupa Password ? :(</b></a>
                </div>
            </div>

            <button type="submit" class="mt-3 mb-2 w-100 p-2 border-0">Masuk</button>
            <div class="register">
                <span>Belum punya akun? <a href="{{ route('regis') }}"
                        class="text-decoration-none"><b>Daftar!</b></a></span>
            </div>
        </form>
    </main>
@endsection
