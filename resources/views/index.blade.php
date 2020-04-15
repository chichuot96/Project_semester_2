@extends('header')
@section('container')
    <div id="colorlib-reservation">
        <!-- <div class="container"> -->
        <div class="row">
            <div class="search-wrap">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> Tour</a></li>
                        <li><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i>Destination</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="flight" class="tab-pane fade in active">
                        <form method="post" action="{{route('searchTour')}}" class="colorlib-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >Where:</label>
                                        <div class="form-field">
                                            <input type="text" name="tour" class="form-control" placeholder="Search name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >Guest</label>
                                        <div class="form-field">
                                            <input type="text" name="numPeo" class="form-control" placeholder="Number of guest">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="submit" id="submit" value="Find Tour" class="btn btn-primary btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="hotel" class="tab-pane fade">
                        <form method="post" action="{{route('searchDes')}}" class="colorlib-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booknow">
                                        <h2>Book Now</h2>
                                        <span>Best Price Online</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >Check-in:</label>
                                        <div class="form-field">
                                            <input type="text" name="destination" class="form-control " placeholder="Search destination">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="submit" id="submit" value="Search" class="btn btn-primary btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="colorlib-tour colorlib-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box" style="margin-top: -45px;">
                <h2>Tour trong nước</h2>
                <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
    </div>
    <div>
        <div class="row" style="padding: 15px">
        @foreach($tour1 as $t)
        <div class="col-md-3 col-sm-6 d-flex align-items-stretch" style="margin-top: 15px">
            <div class="card" style=" margin: auto">
                <a href="{{route('admin_tour.show',$t->id)}}">
                    <img class="card-img-top tour-img" src="http://res.cloudinary.com/a123abc/image/upload/{{$t->cover}}" alt="Card image cap" style="width: 286px; height: 180px">
                </a>    
                <div class="card-body" style="margin-top: 10px">
                    <h5 class="card-title"><a style="color: blue; margin-top:10px;height: 40px" href="{{route('admin_tour.show',$t->id)}}">{{$t->tour_name}}</a></h5>
                    <p class="card-text" stlye="height: 40px">Start at: {{$t->start_at}}</p>
                    <a href="#" class="btn btn-primary">{{$t->price}}</a>
                </div>
            </div>
        </div>    
        @endforeach
        </div>

    </div>
    <!-- <div class="tour-wrap">

        @foreach($tour1 as $t)
        <a href="{{route('admin_tour.show',$t->id)}}" class="tour-entry animate-box">
            <div class="tour-img" style="background-image: url(http://res.cloudinary.com/a123abc/image/upload/{{$t->cover}});">
            </div>
            <div class="desc">
                <p class="star">
                    <span>
                        <i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i>
                    </span> 545 Reviews</p>
                <a href="{{route('admin_tour.show',$t->id)}}">{{$t->tour_name}}</a>
                <span class="city">{{$t->start_at}}</span>
                <span class="price">{{$t->price}}</span>
            </div>

        </a>
            @endforeach
    </div> -->
</div>


<!-- <div id="colorlib-hotel" style="margin-top: -95px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>Tour du lịch quốc tế</h2>
                <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box">
                <div class="owl-carousel">
                    @foreach($tour2 as $t2)
                    <div class="item">
                        <div class="hotel-entry">
                            <a href="{{route('admin_tour.show',$t2->id)}}" class="hotel-img" style="background-image: url(http://res.cloudinary.com/a123abc/image/upload/{{$t2->cover}});">
                                <p class="price"><span>{{$t2->price}}</span> VND</p>
                            </a>
                            <div class="desc">
                                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                <h3><a href="{{route('admin_tour.show',$t2->id)}}">{{$t2->tour_name}}</a></h3>
                                <span class="place">{{$t2->start_at}}</span>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->

<div id="colorlib-subscribe" style="background-image: url({{asset('images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">
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
