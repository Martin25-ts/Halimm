@extends('Layout.main')

@section('title', 'Order-Ellocker')


@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush


@push('js-content')


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/order.js') }}"></script>

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
    @else
        {{-- Pesan biasa tanpa jenis --}}
        <script>
            toastr("{!! session('message') !!}"); // Sesuaikan dengan nama session Anda
        </script>
    @endif
@endpush


@section('content')
    @include('Layout.navbar')
    <section class="order d-flex justify-content-center w-100">
        <div class="order-container">
            <div class="order-content">
                <form action="{{ route('pay', ['location'=> $location]) }}" method="POST">
                    @csrf
                    <div class="qty">
                        <label for="lockerqty">
                            <img src="" alt="">
                            <span>Jumlah Locker</span>
                        </label>
                        <div class="input lockerqty w-100">
                            <div class="button-action">

                                <button id="decrement" type="button" max={{$max}} onclick="stepper(this)">
                                    <img src="https://ucarecdn.com/19524c7d-1bb8-408f-8b9b-21124f3e9c43/" alt="">
                                </button>
                                <button id="increment" type="button" max={{$max}} onclick="stepper(this)">
                                    <img src="https://ucarecdn.com/ea39f8b0-c251-4dfc-8bf2-52eebca3773a/" alt="">
                                </button>
                            </div>

                            <input type="number" id="qty-input" name="lockerqty" value="1" readonly>

                        </div>
                    </div>

                    <div class="duration">

                        <label for="lockerduration">
                            <img src="" alt="">
                            <span>Durasi</span>
                        </label>
                        <select class="" name="lockerduration" id="lockerduration">
                            <option value="60">1 Jam</option>
                            <option value="120">2 Jam</option>
                            <option value="180">3 Jam</option>
                            <option value="240">4 Jam</option>
                            <option value="300">5 Jam</option>
                            <option value="360">6 Jam</option>
                        </select>
                    </div>


                    <div class="payment">

                        <label for="paymentmethod">
                            <img src="" alt="">
                            <span>Metode Bayar</span>
                        </label>
                        <select class="" name="paymentmethod" id="paymentmethod">
                            <option value="Ovo">Ovo</option>
                            <option value="GoPay">Go Pay</option>
                            <option value="ShopeePay">Shopee Pay</option>
                        </select>
                    </div>

                    <button type="submit">
                        <div class="button-content">
                            <img src="" alt="">
                            <span>Pesan</span>
                        </div>
                    </button>

                </form>
            </div>
        </div>
    </section>
@endsection
