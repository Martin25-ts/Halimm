@extends('Layout.main')

@section('title', 'Payment - Ellocker')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endpush


@push('js-content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/payment.js') }}"></script>

    @if (session('error'))
        <script>
            toastr.error("{!! session('error') !!}");
        </script>
    @elseif (session('success'))
        <script>
            toastr.success("{!! session('success') !!}");
        </script>
    @elseif (session('info'))
        <script>
            toastr.info("{!! session('info') !!}");
        </script>
    @elseif (session('warning'))
        <script>
            toastr.warning("{!! session('warning') !!}");
        </script>
    @endif
@endpush


@section('content')
    <header>
        <div class="title-container">
            <h1 class="content1">Menunggu</h1>
            <h1 class="content2">Pembayaran</h1>
        </div>
    </header>

    <section class="listorder">
        <div class="listorder-container">
            <div class="listorder-content">

                @foreach ($listlocker as $locker)
                    <div class="locker">
                        <div class="locker-content">
                            <div class="content-left">
                                <h1>{{$locker->locker_number}}</h1>
                                <span>{{$locker->location->location_name}}</span>
                            </div>
                            <div class="content-right">
                                <div class="circle">
                                    <h1 class="">{{$locker->locker_size}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>

    </section>


@endsection
