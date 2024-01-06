@extends('Layout.main')


@section('title', 'Login Dulu :)')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/prelog.css') }}">
@endpush

@section('content')
    <section class="content">

        <header class="title-content">
            <h1>Hallo</h1>
            <h3>Silahkan login sebelum menggunakan penyimpanan locker</h3>
        </header>


        <main class="prelog-content">
            <div class="logo-content">
                <img src="https://ucarecdn.com/36f1e9fd-0dbd-4a1c-be32-019e2171b0da/-/preview/500x500/-/quality/smart/-/format/auto/" alt="">
            </div>
            <div class="button-masuk">
                <a href="{{ route('log') }}">Masuk</a>
            </div>

        </main>

    </section>
@endsection

