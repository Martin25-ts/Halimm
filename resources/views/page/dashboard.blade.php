@extends('Layout.main')

@section('title', 'Dashboard - Ellocker')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/lockerbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lockerlist.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endpush

@push('js-content')
    <Script>
        var data1= @json($datalocker);
        var data2= @json($location);


        console.log(data1);
        console.log(data2);

    </Script>
@endpush

@section('content')
    @include('Layout.navbar')
    @include('Layout.lockerlist')
@endsection

