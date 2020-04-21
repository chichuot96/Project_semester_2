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
            <h1>
                <strong>
                    {{$tour->tour_name}}
                </strong>
            </h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="wrap-division">
                            {!! $tour->description !!}
                        </div>
                    </div>
                </div>


                <!-- SIDEBAR-->
                <div class="col-md-4">
                    <div class="sidebar-wrap">
                        <div class="side search-wrap animate-box">
                            <h3 class="sidebar-heading">Tour information</h3>
                            <form method="post" class="colorlib-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date"><strong>Pick up at:</strong> {{$tour->start_at}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date"><strong>Type:</strong> {{$tour->category->name}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date"><strong>Check in:</strong> {{date_format(date_create($tour->time_start), 'd-m-Y H:i')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date"><strong>Number of day:</strong> {{$tour->num_of_day}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date"><strong>Ticket left:</strong> {{$tour->num_of_per}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date"><strong>Price:</strong> {{$tour->price}}VNĐ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{route('booktour',['id'=>$tour->id])}}" class="btn btn-primary btn-block">Book Tour</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <a class="btn btn-primary" href="{{route('booktour',['id'=>$tour->id])}}"> Book tour</a>
        </div>
    </div>

    @endsection
