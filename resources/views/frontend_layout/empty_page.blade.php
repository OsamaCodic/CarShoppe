<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- FAVICON -->
    <link href="{{ asset('frontend-layout') }}/img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend-layout') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend-layout') }}/plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <link href="{{ asset('frontend-layout') }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('frontend-layout') }}/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend-layout') }}/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{ asset('frontend-layout') }}/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="{{ asset('frontend-layout') }}/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{ asset('frontend-layout') }}/css/style.css" rel="stylesheet">
</head>

<body class="body-wrapper">

    <section>
        @include('frontend_layout.header')
    </section>


   {{-- Content --}}
   
   {{-- /Content --}}

    @include('frontend_layout.footer')

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('frontend-layout') }}/plugins/jQuery/jquery.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/bootstrap/js/bootstrap-slider.js"></script>
    <!-- tether js -->
    <script src="{{ asset('frontend-layout') }}/plugins/tether/js/tether.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/raty/jquery.raty-fa.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
    </script>
    <script src="{{ asset('frontend-layout') }}/plugins/google-map/gmap.js"></script>
    <script src="{{ asset('frontend-layout') }}/js/script.js"></script>
</body>

</html>
