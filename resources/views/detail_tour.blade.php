@extends('header')
<style>
    img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@section('container')
    <div class="colorlib-wrap">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-9">
                            {!! $tour->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
