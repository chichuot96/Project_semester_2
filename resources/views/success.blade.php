@extends('header')
@section('container')
    <div class="container">
        <h1> {{$msg}} </h1>
        <h2> click vào <a href="{{route('index')}}">link</a> để quay lại trang chính . </h2>
    </div>
    @endsection
