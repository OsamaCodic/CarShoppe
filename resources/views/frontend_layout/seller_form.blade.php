<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sell Car</title>

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
    <section class=" bg-gray py-5">
        <div class="container">
            <form id="sellerForm" action="{{url('front/store_owner_details')}}" method="POST">

                @csrf
                <h3><strong class="text-success">{{$product->name}}</strong> onwer detail</h3> <hr>

                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="role" value="2">
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="country">
                                <option value="">-- Country --</option>
                                <option value="America">America</option>
                                <option value="Australia">Australia</option>
                                <option value="India">India</option>
                                <option value="Japan">Japan</option>
                                <option value="China">China</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Korea">Korea</option>
                                <option value="England">England</option>
                                <option value="Saudia">Saudia</option>
                                <option value="Russia">Russia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="city">
                                <option value="">-- City --</option>
                                <option value="America">Sargodha</option>
                                <option value="America">Lahore</option>
                                <option value="America">Islamabad</option>
                                <option value="America">Karachi</option>
                                <option value="America">Siakot</option>
                                <option value="America">Gujraat</option>
                                <option value="America">Quidabad</option>
                                <option value="America">Failabad</option>
                                <option value="America">Failabad</option>
                                <option value="America">Rawalpindi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>
                </div>
            
            
                <div class="err_div">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                    @endforeach
                    @endif
                </div>
                <br>

                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Make sure personal information is correct before submit form!
                </div>

                
                <button type="submit" id="submitBtn" class="btn btn-danger rounded-pill themeBtn zoomBtn"  style="">Submit</button>
            </form>
        </div>
    </section>
    {{-- /Content --}}

    @include('frontend_layout.footer')

    <!-- JAVASCRIPTS -->
    {{-- <script src="{{ asset('frontend-layout') }}/plugins/jQuery/jquery.min.js"></script> --}}
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

    {{-- <script src="{{ asset('frontend-layout') }}/js/script.js"></script> --}}

</body>

</html>
