@extends('Layout.main')

@section('title', 'Dashboard - Ellocker')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lockerlist.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lockerbox.css') }}">
@endpush

@push('js-content')
    {{-- <Script>
        var data1= @json($datalocker);
        var data2= @json($location);


        console.log(data1);
        console.log(data2);

    </Script> --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @elseif (session('success'))
        <script>
            toastr.success("{!! session('success') !!}");
        </script>
    @endif
@endpush

@section('content')
    @include('Layout.navbar')
    @include('Layout.lockerlist')
@endsection

