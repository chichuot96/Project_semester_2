@extends('header')

@section('container')
    <div class="colorlib-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="wrap-division">
                            @foreach($lsTour as $tour)
                            <div class="col-md-6 col-sm-6 animate-box">
                                <div class="tour">
                                    <a href="{{route('tour.show', $tour->id)}}" class="tour-img" style="background-image: url({{$tour->cover}});">
                                        <p class="price"><span>{{$tour->price}}VNĐ</span> <small>/ {{$tour->num_of_day}} Days</small></p>
                                    </a>
                                    <span class="desc">
											<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
											<h2><a href="tour-place.html">{{substr($tour->tour_name, 0, 40)}}...</a></h2>
											<span class="city">{{$tour->destination->name}}</span>
										</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">

                            <ul class="pagination">
                                {{ $lsTour->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR-->
                <div class="col-md-3">
                    <div class="sidebar-wrap">
                        <div class="side search-wrap animate-box">
                            <h3 class="sidebar-heading">Find your tour</h3>
                            <form method="post" class="colorlib-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Where:</label>
                                            <div class="form-field">
                                                <input type="text" id="location" class="form-control" placeholder="Search Location">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Check-in:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Check-out:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Guest</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="people" id="people" class="form-control">
                                                    <option value="#">1</option>
                                                    <option value="#">2</option>
                                                    <option value="#">3</option>
                                                    <option value="#">4</option>
                                                    <option value="#">5+</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" id="submit" value="Find Flights" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Địa danh khác</h3>
                                    <ul>
                                        <li><a href="">Phú Quốc</a></li>
                                        <li><a href="">Hải Phòng</a></li>
                                        <li><a href="">Lạng Sơn</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Tin tức</h3>
                                    <ul>
                                        <li><a href="">Blog 1</a></li>
                                        <li><a href="">Blog 2</a></li>
                                        <li><a href="">Blog 3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Khuyến mãi đặc biệt</h3>
                                    <img src="images/00097-300x600.gif">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Sign Up for a Newsletter</h2>
                    <p>Sign up for our mailing list to get latest updates and offers.</p>
                    <form class="form-inline qbstp-header-subscribe">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" placeholder="Enter your email">
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
