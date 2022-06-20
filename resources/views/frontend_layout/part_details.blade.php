<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>accessory_details</title>

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
   <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="accessory-details">
                        <h1 class="accessory-title">{{$accessory->brand->title}} {{$accessory->title}}</h1>
                        <div class="accessory-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i> Brand <a href="">{{$accessory->brand->title}}</a></li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Type<a href="">{{$accessory->type->title}}</a></li>
                            </ul>
                        </div>

                        <!-- accessory slider -->
                        <div class="accessory-slider">
                            <div class="accessory-slider-item my-4" data-image="{{asset('storage')}}/accessories_Images/{{@$accessory->image_name}}">
                                <img src='{{asset('storage')}}/accessories_Images/{{@$accessory->image_name}}' height="100%" width="100%" />
                            </div>
                        </div>
                        <!-- accessory slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">Specifications</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">accessory Description</h3>

                                    @if ($accessory->description != null)
                                        <p>{!! $accessory->description !!}</p>
                                    @else
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia laudantium beatae quod perspiciatis, neque dolores eos rerum, ipsa iste cum culpa numquam amet provident eveniet pariatur, sunt repellendus quas voluptate dolor cumque autem molestias. Ab quod quaerat molestias culpa eius, perferendis facere vitae commodi maxime qui numquam ex voluptatem voluptate, fuga sequi, quasi! Accusantium eligendi vitae unde iure officia amet molestiae velit assumenda, quidem beatae explicabo dolore laboriosam mollitia quod eos, eaque voluptas enim fuga laborum, error provident labore nesciunt ad. Libero reiciendis necessitatibus voluptates ab excepturi rem non, nostrum aut aperiam? Itaque, aut. Quas nulla perferendis neque eveniet ullam.</p>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Accessory Specifications</h3>
                                    <table class="table table-bordered accessory-table">
                                        <tbody>
                                            <tr>
                                                <td>Varients</td><td>{{$accessory->varients}}</td>
                                            </tr>

                                            <tr>
                                                <td>Colours</td><td>{{$accessory->colours}}</td>
                                            </tr>

                                            <tr>
                                                <td>Dimensions</td><td>{{$accessory->dimensions}}</td>
                                            </tr>

                                            <tr>
                                                <td>Dimensions</td><td>{{$accessory->delivery_date}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Price</h4>
                            <p>Rs. {{$accessory->price}}</p>
                        </div>
                        <!-- User Profile widget -->

                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                            <h4><a href="">New Car</a></h4>
                            <p class="member-time"><strong>Publish Date</strong><br>{{$accessory->created_at}}</p>

                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href="{{url('front/accessory/purchased_process/'.$accessory->id)}}" class="btn btn-offer d-inline-block btn-success ml-n1 my-1 px-lg-4 px-md-3">Purchase</a></li>
                            </ul>
                        </div>

                        <!-- Rate Widget -->
                        <div class="widget rate">
                            <!-- Heading -->
                            <h5 class="widget-header text-center">What would you rate
                                <br>
                                this accessory</h5>
                            <!-- Rate -->
                            <div class="starrr"></div>
                        </div>
                        
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            <p>Have a great accessory to post ? Share it with
                                your fellow users.
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>

   
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
