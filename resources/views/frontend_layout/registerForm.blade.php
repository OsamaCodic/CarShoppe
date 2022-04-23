<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CarShoppe | Register</title>
  
  <!-- FAVICON -->
  <link href="{{asset('frontend-layout/')}}img/favicon.png" rel="shortcut icon">
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


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
@include('layouts.app_css')

<body class="body-wrapper">

  <section class="login py-5 border-top-1">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-5 col-md-8 align-item-center">
                  <div class="border">
                    <h3 class="bg-gray p-4">Register here</h3>
                    <fieldset class="p-4">
                      <form id="front_registerForm" action="{{url('front/save_register')}}" method="post">
                        @csrf
                        <input type="text" name="first_name" placeholder="First Name" class="border p-3 w-100 my-2">
                        <input type="text" name="last_name" placeholder="Last Name" class="border p-3 w-100 my-2">
                        <input type="text" name="email" placeholder="Email" class="border p-3 w-100 my-2">
                        <input type="text" name="password" placeholder="Password" class="border p-3 w-100 my-2">
                        <input type="hidden" name="role" value="2">
                        <button type="submit" id="regBtn" class="d-block py-3 px-5 bg-success text-white border-0 rounded font-weight-bold mt-3">Register</button>
                      </form>
                    </fieldset>
                  </div>
              </div>
          </div>
      </div>
  </section>

<!--============================
=            Footer            =
=============================-->

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

@include('layouts.app_js')

@include('frontend_layout.partials.register_js')

</body>
</html>