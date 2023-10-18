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
        var screenWidth = $(window).width();

            // Menampilkan tinggi layar di console (opsional)
            console.log("Tinggi Layar: " + screenHeight + " piksel");
            console.log("Lebar Layar : " + screenWidth + " piksel");

            // Menambahkan tinggi layar ke dalam elemen HTML
            // $('span').append('<p>Tinggi Layar: ' + screenHeight + ' piksel</p>');
    </script>


@endpush




@section('content')

    @include('Layout.navbar')


    <section class="locker-control">
        <div class="locker-controll-content">
            <div class="locker-control-container">
                {{-- @foreach ($datalocker as $datalocker) --}}
                    @include('Layout.lockerborder')


                <div class="locker-order">
                    <div class="locker-buttons">
                        @if ($datalocker->status_door == true)
                            <form action="{{ route('Unlock', ['location' => $location, 'lockerid'=> $datalocker->locker_id]) }}" method="post">
                                @csrf
                                <button id="unlock-button" class="button-unlock">
                                    <img src="https://ucarecdn.com/ddf211f4-e360-4c85-b386-0181e4174f08/" alt="">
                                    <h1 class="button-title">Buka</h1>
                                </button>
                            </form>

                        @else

                            <form action="{{ route('Lock', ['location' => $location, 'lockerid' => $datalocker->locker_id]) }}" method="post">
                                @csrf
                                <button id="lock-button" data-lockerid="{{ $datalocker->locker_id }}" class="button-unlock">
                                    <img src="https://ucarecdn.com/a84c688e-83ba-4ea0-b6ee-2999ac810166/" alt="">
                                    <h1 class="button-title">Kunci</h1>
                                </button>
                            </form>

                        @endif



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
