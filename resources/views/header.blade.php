<!DOCTYPE HTML>
<html ng-app="indexApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AmazingViet Tour</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="{{asset('js/index.js')}}"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <!-- Modernizr JS -->
    <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
<!--[if lt IE 9]>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
    @stack('head')
</head>
<body>


<div id="page" ng-controller="indexPageCtrl">
    <nav class="colorlib-nav" role="navigation" >
        <div class="top-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="{{route('index')}}">AmazingViet</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li ><a href="{{route('index')}}">Home</a></li>
                            <li >
                                <a href="{{route('tour.index')}}">Tours</a>
                            </li>
                            <li><a href="{{route('des')}}">Destination</a></li>
                            <li><a href="{{route('service')}}">Services</a></li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>

                            @if (Auth::check())
                                @if(Auth::user()->role==2)
                                    <li class="has-dropdown"> <a>Admin Page</a>
                                        <ul class="dropdown">
                                            <li><a href="{{route('admin')}}">Manage User</a></li>
                                            <li><a href="{{route('admin_tour.index')}}">Manage tour</a></li>
                                            <li><a href="{{route('destination.index')}}">Manage destination</a></li>
                                            <li><a href="{{route('category.index')}}">Manage category</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="has-dropdown"><a>Hello, {{Auth::user()->full_name}} </a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('logout')}}">Logout</a></li>
                                        <li><a href="{{route('info',Auth::user()->id)}}">Information</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="has-dropdown">
                                    <a >Login</a>

                                    <ul class="dropdown">
                                        <li><a href="{{route('login')}}">Login</a></li>
                                        <li><a href="{{route('register')}}">Register</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url('http://res.cloudinary.com/a123abc/image/upload/tam-coc-ninh-binh_tjxm73');">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>2 amazing Days</h2>
                                    <h1>Viet nam Tour</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url('http://res.cloudinary.com/a123abc/image/upload/cau-the-huc-1_kw4rhk');">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>10 Days Cruises</h2>
                                    <h1>From Ha Noi to Da Nang</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url('http://res.cloudinary.com/a123abc/image/upload/thac-ban-gioc_agvxev');">
                    <div class="overlay"></div>
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Explore more</h2>
                                    <h1>Our Travel Agency</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url('http://res.cloudinary.com/a123abc/image/upload/nha-hat-lon-ha-noi_uchx7r');">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Experience the</h2>
                                    <h1>Best Trip Ever</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
</div>
<div>
    @section('container')
    @show
</div>

<footer id="colorlib-footer" role="contentinfo">

    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-3 colorlib-widget">
                <h4>Tour Agency</h4>
                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                <p>
                <ul class="colorlib-social-icons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>

            </div>
            <div class="col-md-2 colorlib-widget">
                <h4>Book Now</h4>
                <p>
                <ul class="colorlib-footer-links">
                    <li><a href="{{route('tour.index')}}">Tours</a></li>
                    <li><a href="{{route('des')}}">Destination</a></li>
                    <li><a href="#">Tour</a></li>
                    <li><a href="#">Car Rent</a></li>
                    <li><a href="#">Beach &amp; Resorts</a></li>
                    <li><a href="#">Cruises</a></li>
                </ul>

            </div>
            <div class="col-md-2 colorlib-widget">
                <h4>Top Deals</h4>
                <p>
                <ul class="colorlib-footer-links">
                    <li><a href="#">Edina Hotel</a></li>
                    <li><a href="#">Quality Suites</a></li>
                    <li><a href="#">The Hotel Zephyr</a></li>
                    <li><a href="#">Da Vinci Villa</a></li>
                    <li><a href="#">Hotel Epikk</a></li>
                </ul>

            </div>
            <div class="col-md-2">
                <h4>Blog Post</h4>
                <ul class="colorlib-footer-links">
                    <li><a href="#">The Ultimate Packing List For Female Travelers</a></li>
                    <li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>
                    <li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-md-push-1">
                <h4>Contact Information</h4>
                <ul class="colorlib-footer-links">
                    <li>Detech building, <br>No.8 Tôn Thất Thuyết St</li>
                    <li><a href="tel://8461329400">+ 8496 1329 400</a></li>
                    <li><a href="mailto:info@yoursite.com">amazingviettourguide@ygmail.com</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>

            </div>
        </div>
    </div>
</footer>


<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>


<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<!-- Main -->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
<script>

    var cloudName= "a123abc";
    var unsignedUploadPreset="qbhmhxzq";
    var img = document.querySelector('[name="image"]');
    img.onchange = function () {
        var file = this.files[0];
        var url = `https://api.cloudinary.com/v1_1/${cloudName}/upload`;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var responseDataJson = JSON.parse(this.responseText);
                console.log(responseDataJson);
                var imageUrl = document.querySelector('input[name="imageUrl"]');
                imageUrl.value = responseDataJson.public_id;
                document.getElementById('image-preview').src = responseDataJson.url;
            }
        }
        xhr.open('POST', url, true);
        var fd = new FormData();
        fd.append('upload_preset', unsignedUploadPreset);
        fd.append('tags', 'browser_upload');
        fd.append('file', file);
        xhr.send(fd);
    }

</script>
</body>
</html>
