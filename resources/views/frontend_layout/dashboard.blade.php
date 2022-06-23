<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  
  <!-- FAVICON -->
  <link href="{{asset('frontend-layout')}}/images/car-logo.png" rel="shortcut icon">

  {{-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"> --}}

  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('frontend-layout')}}/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('frontend-layout')}}/plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="{{asset('frontend-layout')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{asset('frontend-layout')}}/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="{{asset('frontend-layout')}}/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{asset('frontend-layout')}}/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="{{asset('frontend-layout')}}/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{asset('frontend-layout')}}/css/style.css" rel="stylesheet">
</head>

<body class="body-wrapper">

    
    <section>
	@include('frontend_layout.header')
</section>

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Car </h1>
					<p>Join the millions who buy and sell vehicles from each other <br> everyday in local cities around the pakistan</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
                            @foreach ($types as $type)
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-car"></i> {{$type->title}}</a>
                                </li>
                            @endforeach
						</ul>
					</div>
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                    <form action="{{url('front/advance_search_product')}}" method="get">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <select name="brand_id" class="w-100 form-control mt-lg-1 mt-md-2">
                                                    <option>Brand</option>
                                                    @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <select name="type_id" class="w-100 form-control mt-lg-1 mt-md-2">
                                                    <option>Category</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control my-2 my-lg-1" id="name" name="name" placeholder="What are you looking for">
                                            </div>
                                            <div class="form-group col-md-2 align-self-center">
                                                <button type="submit" class="btn btn-primary">Search Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Popular Brands in {{now()->year}}</h2>
					<p>Find latest cars in Pakistan 2022 & new car models markets rates with specification only at CarShoppe</p>
				</div>
			</div>
		</div>
		<div class="row">
            <!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
                    @foreach ($brands as $brand)
                    
                    
                    <div class="col-sm-12 col-lg-4">
                        <!-- product card -->
                        <div class="product-item bg-light">
                                <div class="">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="#">
                                            <img class="card-img-top img-fluid" src="{{asset('storage')}}/brands_logos/{{@$brand->logo}}"  alt="Card image cap">
                                        </a>
                                    </div>
                                    <form action="">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="{{url('front/products?searchbyLogo='.$brand->id)}}">{{$brand->title}}</a></h4>
                                            <ul class="list-inline product-meta">
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="fa fa-car"></i>{{$brand->products->count()}}</a>
                                                </li>
                                            </ul>
                                            <ul class="list-inline product-meta">
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="fa fa-calendar"></i>{{$brand->created_at}}</a>
                                                </li>
                                            </ul>
                                            <p class="card-text">{!! $brand->description !!}</p>
                                            <div class="product-ratings">
                                                <ul class="list-inline">

                                                    @for ($i = 0; $i < $brand->rate; $i++)
                                                        <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    @endfor
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<!--====================================
    =            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<h2>Start today to link with CarShoppe</h2>
					<ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-main" href="{{url('front/products?status=1')}}">Buy New Car</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="{{url('front/products?status=2')}}">Buy Use Car</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--============================
=            Footer            =
=============================-->

@include('frontend_layout.footer')

<!-- JAVASCRIPTS -->
<script src="{{asset('frontend-layout')}}/plugins/jQuery/jquery.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="{{asset('frontend-layout')}}/plugins/tether/js/tether.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/raty/jquery.raty-fa.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{asset('frontend-layout')}}/plugins/google-map/gmap.js"></script>
<script src="{{asset('frontend-layout')}}/js/script.js"></script>

</body>

</html>



