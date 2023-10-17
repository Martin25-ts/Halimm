@extends('Layout.main')

@section('title', 'Locker - Ellocker')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lockerbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/userlocker.css') }}">
@endpush

@push('js-content')
    <script>
        var data1 = @json($datalocker);
        console.log(data1);
    </script>

    <script>
        var screenHeight = $(window).height();

            // Menampilkan tinggi layar di console (opsional)
            console.log("Tinggi Layar: " + screenHeight + " piksel");

            // Menambahkan tinggi layar ke dalam elemen HTML
            // $('span').append('<p>Tinggi Layar: ' + screenHeight + ' piksel</p>');
    </script>
@endpush




@section('content')

    @include('Layout.navbar')


    <section class="locker-control">
        <div class="locker-controll-content">
            <div class="locker-control-container">
                @foreach ($datalocker as $datalocker)
                    @include('Layout.lockerborder')
                @endforeach

                <div class="locker-order">
                    <div class="locker-buttons">
                        <button class="button-unlock">
                            <img src="https://ucarecdn.com/ddf211f4-e360-4c85-b386-0181e4174f08/" alt="">
                            <h1 class="button-title">Buka</h1>
                        </button>
                        <button class="button-finish-rent">
                            <h1 class="button-title">SELESAIKAN PENYEWAAN</h1>
                        </button>
                    </div>
                </div>


                <div class="locker-timer">
                    <div class="locker-timer-content">
                        <img width="24px" src="https://ucarecdn.com/4af8a76f-1495-4642-af7a-f11840ec4fd8/" alt="">
                        <span class="server-time">01 : 45 : 17</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
