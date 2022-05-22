<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Products</title>

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


    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control my-2 my-lg-0" id="inputtext4"
                                        placeholder="What brand you looking for">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control my-2 my-lg-0" id="inputCategory4"
                                        placeholder="which category you want">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control my-2 my-lg-0" id="inputLocation4"
                                        placeholder="Search product">
                                </div>
                                <div class="form-group col-md-2">

                                    <button type="submit" class="btn btn-primary">Search Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">All Brands</h4>
                            <ul class="category-list">
                              @foreach ($brands as $brand)  
                                <li><a href="#">{{$brand->title}}<span>{{$brand->products->count()}}</span></a></li>
                              @endforeach
                            </ul>
                        </div>

                        <div class="widget category-list">
                            <h4 class="widget-header">Nearby</h4>
                            <ul class="category-list">
                                <li><a href="category.html">New York <span>93</span></a></li>
                                <li><a href="category.html">New Jersy <span>233</span></a></li>
                                <li><a href="category.html">Florida <span>183</span></a></li>
                                <li><a href="category.html">California <span>120</span></a></li>
                                <li><a href="category.html">Texas <span>40</span></a></li>
                                <li><a href="category.html">Alaska <span>81</span></a></li>
                            </ul>
                        </div>

                        <div class="widget filter">
                            <h4 class="widget-header">Show Produts</h4>
                            <select>
                                <option>Popularity</option>
                                <option value="1">Top rated</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
                        </div>

                        <div class="widget price-range w-100">
                            <h4 class="widget-header">Price Range</h4>
                            <div class="block">
                                <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000"
                                    data-slider-step="5" data-slider-value="[0,5000]">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="value">$10 - $5000</span>
                                </div>
                            </div>
                        </div>

                        <div class="widget product-shorting">
                            <h4 class="widget-header">By Condition</h4>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Brand New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Almost New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Gently New
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Havely New
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="category-search-filter">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Short</strong>
                                <select>
                                    <option>Most Recent</option>
                                    <option value="1">Most Popular</option>
                                    <option value="2">Lowest Price</option>
                                    <option value="4">Highest Price</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @foreach ($products as $product)
                      <div class="ad-listing-list mt-20">
                        <div class="row p-lg-3 p-sm-5 p-4">
                            <div class="col-lg-4 align-self-center">
                                <a href="single.html">
                                    <img src="{{asset('storage')}}/images/{{@$product->productImages[0]->image_name}}" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="ad-listing-content">
                                            <div>
                                                <a href="single.html" class="font-weight-bold">{{$product->name}}</a>
                                            </div>
                                            <ul class="list-inline mt-2 mb-3">
                                                <li class="list-inline-item"><a href="category.html"> <i
                                                            class="fa fa-folder-open-o"></i> {{$product->brand->title}}</a></li>
                                                <li class="list-inline-item"><a href=""><i
                                                            class="fa fa-calendar"></i> {{$product->type->title}}</a></li>
                                            </ul>
                                            
                                            <p class="pr-5">
                                              @if ($product->description != null)
                                                {!! $product->description !!}
                                              @else
                                                <p class="text-danger">N/A</p>  
                                              @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 align-self-center">
                                        <div class="product-ratings float-lg-right pb-3">
                                          <strong class="text-success">{{$product->price}}</strong>
                                          <br>
                                          <a href="{{url('front/product/'.$product->id.'/details')}}" class="btn btn-info btn-sm">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach

                    <!-- ad listing list  -->

                    <!-- pagination -->
                    <div class="pagination justify-content-center py-4">
                        <nav aria-label="Page navigation example">
                          {!! $products->links() !!}
                        </nav>
                    </div>
                    <!-- pagination -->
                </div>
            </div>
        </div>
    </section>

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
