@extends('Layout.main')

@section('title', 'Dashboard - Ellocker')

@push('css-content')
    <link rel="stylesheet" href="{{ asset('css/locker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endpush

@section('content')
    @include('Layout.navbar')
    @include('Layout.locker')
@endsection

