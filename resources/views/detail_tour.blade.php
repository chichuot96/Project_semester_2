@extends('header')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-9">
                {!! $tour->description !!}
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>

    @endsection
