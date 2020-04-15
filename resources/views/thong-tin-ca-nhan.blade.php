@extends('header')
@section('container')

		<div class="colorlib-wrap" style="padding-top: 3em;">
        <div class="container">
            <h1 class="text-center">Thông tin cá nhân</h1>
            <div class="container">
            <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="https://hocwebgiare.com/thiet_ke_web_chuan_demo/bootstrap_user_profile/images/profile_user.jpg" class="img-responsive" alt="Thông tin cá nhân">
                </div>
                <div class="profile-usertitle">
                <div class="profile-usertitle-name">                     Họ và Tên: {{$user->full_name}}                </div>
                <div class="profile-usertitle-job">                      Email:{{$user->email}}                   </div>
                </div>
                <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm">Trang chủ</button>
                <button type="button" class="btn btn-danger btn-sm">Thoát ra</button>
                </div>
                <div class="profile-usermenu">
                <ul class="nav">
                    <!-- <div class="logo_menuchinh" style="float:left; padding-top:5px; padding-left:10px; color:#fff; margin-left:auto; margin-right:auto; text-align=center; line-height:40px; font-size:16px;font-weight:bold;font-family:Arial">HOCWEBGIARE.COM</div><div class="menu-icon"><span>Menu</span></div>                       -->
                <li class="active">                         <a href="https://hocwebgiare.com/">                         <i class="glyphicon glyphicon-info-sign"></i>                           Cập nhật thông tin cá nhân </a>
                </li>
                <li>                            <a href="#">                         <i class="glyphicon glyphicon-heart"></i>                           Tour yêu thích </a>
                </li>
                <li>                            <a href="#" target="_blank">                         <i class="glyphicon glyphicon-shopping-cart"></i>                           Quản lý đơn hàng </a>
                </li>
                <!-- <li>                            <a href="#">                         <i class="glyphicon glyphicon-envelope"></i>                            Tin nhắn </a>
                </li>                    -->
                </ul>
                </div>
                </div>
            </div>
                <div class="col-md-9">
                    <div class="profile-content">             Chào mừng Bạn đến với website Amazing tour </div>
                    <div> Các tour đã book</div>
                    <div class="row">

                    @foreach($tours as $tour)
                        <div class="col-md-6 col-sm-6 animate-box">
                            <div class="tour">
                                <a href="{{route('tour.show', $tour->tour_id)}}" class="tour-img" style="background-image: url(http://res.cloudinary.com/a123abc/image/upload/{{$tour->cover}});">
                                    <p class="price"><span>{{$tour->price}}VNĐ</span> <small>/ người</small></p>
                                </a>
                                <div class="desc">
											<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
											<h2><a href="{{route('tour.show',$tour->id)}}">{{substr($tour->tour_name, 0, 40)}}...</a></h2>
                                            <span>Khởi hành: {{$tour->time}}</span>
                                                <br>
                                            <span>{{$tour->num_of_per}} người</span>
										</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>
		</div>


@endsection
