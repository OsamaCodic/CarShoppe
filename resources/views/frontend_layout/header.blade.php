<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light navigation">
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('frontend-layout')}}/images/car-logo.png" width="270" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto main-nav ">

                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
                            </a>

                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('front/home')}}">Dashboard</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Main <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('front/home')}}">Brands</a>
                                <a class="dropdown-item" href="{{url('front/products?status=1')}}">New Cars</a>
                                <a class="dropdown-item" href="{{url('front/products?status=2')}}">Used cars section</a>
                                <a class="dropdown-item" href="{{url('front/sellProduct')}}">Sell your car</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Others <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('front/parts')}}">Parts Store</a>
                                <a class="dropdown-item" href="#">Blog</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Site <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">User Profile</a>
                                <a class="dropdown-item" href="#">About Us</a>
                                <a class="dropdown-item" href="#">Contact Us</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Listing <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="category.html">Ad-Gird View</a>
                                <a class="dropdown-item" href="ad-listing-list.html">Ad-List View</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>