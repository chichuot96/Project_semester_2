@extends('header')
@section('container')
    <div class="container">
        <form action="{{asset('booktour/accept')}}" enctype="multipart/form-data" class="form" method="post">
            @csrf
            <div class="form-group">
                <label >Tour</label>
                <input type="text" class="form-control" name="tourName" readonly="readonly" value="{{$tour->tour_name}}" >
                <input type="hidden" class="form-control" name="tourId" readonly="readonly" value="{{$tour->id}}">
            </div>
            <div class="form-group">
                <label >Thời gian</label>
                <input type="text" class="form-control" name="tourLength" readonly="readonly" value="{{$tour->num_of_day}} Ngày" >
            </div>
            <div class="form-group">
                <label >Ngày khởi hành</label>
                <input type="text" class="form-control" name="timeStart" readonly="readonly" value="{{$tour->time_start}} " >
            </div>
            <div class="form-group">
                <label >Price</label>
                <input type="text" class="form-control" name="price" readonly="readonly" value="{{$tour->price}} VND" >
            </div>
{{--            <div class="form-group">--}}
{{--                <label >Số người lớn</label>--}}
{{--                <input type="number" class="form-control" aria-describedby="priceAdult" id="numAdult" placeholder="Số người lớn" >--}}
{{--                <small id="priceAdult" class="form-text text-muted"></small>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label >Số trẻ nhỏ</label>--}}
{{--                <input type="number" class="form-control" id="numChild" placeholder="Số trẻ nhỏ" >--}}
{{--            </div>--}}

            <div class="form-group">
                <label >Mã giảm giá</label>
                <input type="text" class="form-control" name="discount" placeholder="Mã giảm giá" >
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>

@endsection
