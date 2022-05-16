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
            <form id="sellProductForm" action="{{url('front/store_sell_product')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <h3><strong>Sell Car Form</strong></h3> <hr>

                <input type="hidden"  id="" name="product_id" value="{{@$product->id}}" placeholder="">
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-primary" for="brand">Brand  </label>
                            <select class="form-control" name="brand_id" id="brand">
                                <option value="">--Select--</option>
            
                                @foreach (@$brands as $brand)
                                    <option value="{{@$brand->id}}" {{ @$product->brand_id == @$brand->id ? 'selected' : '' }}>{{$brand->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-primary" for="type">Type  </label>
                            <select class="form-control" name="type_id" id="type">
                                <option value="">--Select--</option>
                                
                                @foreach ($types as $type)
                                    <option value="{{@$type->id}}" {{ @$product->type_id == @$type->id ? 'selected' : '' }}>{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary" for="name">Name  </label>
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter product name...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary" for="model">Model  </label>
                            <input type="number" class="form-control" id="model" name="model" value="" placeholder="2015...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary" for="engine_cc">Engine cc</label>
                            <select class="form-control" name="engine_cc" id="engine_cc">
                                <option value="">--Select--</option>
                                <option value="660">660</option>
                                <option value="800">800</option>
                                <option value="1000">1000</option>
                                <option value="1300">1300</option>
                                <option value="1500">1500</option>
                                <option value="1800">1800</option>
                                <option value="2000">2000</option>
                                <option value="2500">2500</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-primary" for="no_of_doors">No of Doors  </label>
                            <select class="form-control" name="no_of_doors" id="no_of_doors">
                                <option value="">--Select--</option>
                                <option value="2">2 Doors</option>
                                <option value="4">4 Doors</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6" id="selected_transmission">
                        <div class="form-group">
                            <label class="text-primary" for="transmission">Transmission  </label>
                            <select class="form-control" name="transmission" id="transmission">
                                <option value="">--Select--</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Mannual">Mannual</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="select_gears" class="form-group" style="display: none">
                            <label class="text-primary" for="gears">Gears  </label>
                            <select class="form-control" name="gears" id="gears">
                                <option value="">--Select--</option>
                                <option value="1" {{ @$product->gears == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ @$product->gears == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ @$product->gears == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ @$product->gears == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ @$product->gears == 5 ? 'selected' : '' }}>5</option>
                                <option value="6" {{ @$product->gears == 6 ? 'selected' : '' }}>6</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary" for="price">Price (Rs)  </label>
                            <input type="number" class="form-control" id="price" name="price" value="" placeholder="Price in rupees">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary" for="varients">Which Varient  </label>
                            <input type="text" class="form-control" id="dimensions" name="varients" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary" for="colours">Colour of your Car</label>
                            <input type="text" class="form-control" id="colours" name="varients" placeholder="">
                        </div>
                    </div>
                </div>
            
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-primary" for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter..." maxlength="50">{{@$product->description}}</textarea>
                        </div>
                    </div>
                </div>
            
                <input type="hidden" name="status" value="2">
            
                <br>
                <div class="form-group">
                    <label class="text-primary" for="">Pictures  </label>
                    <input accept="image/*" id="file-input" type="file" name="filename[]" class="p-1" multiple @if (@$product->productImages == null) required @endif>
            
                    <br>
                    @if (@$product->productImages != null)      
                        @foreach ($product->productImages as $image)
                            <img src="{{asset('storage')}}/images/{{$image->image_name}}" height="20%" width="20%" />
                        @endforeach
                    @endif
                    
                    <div id="preview"></div>
                </div>

                <br>

                <div class="err_div">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                    @endforeach
                    @endif
                </div>
                <br>
                
                <button type="submit" id="submitBtn" class="btn btn-success rounded-pill themeBtn zoomBtn"  style="">Add Post</button>
            </form>
        </div>
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

    <script>
        var transmission = $('#transmission').val()
    if(transmission == "Automatic")
    {
        if ($( "#selected_transmission" ).hasClass('col-md-3'))
        {
            $( "#selected_transmission" ).removeClass( 'col-md-3');
        }
        else
        {
            $( "#selected_transmission" ).addClass( 'col-md-6');
        }
        $("#select_gears").slideUp('fast')
    }
    else if(transmission == "Mannual")
    { 
        if ($( "#selected_transmission" ).hasClass('col-md-6'))
        {
            $( "#selected_transmission" ).removeClass( 'col-md-6');
        }
        else
        {
            $( "#selected_transmission" ).addClass( 'col-md-3');
        }
        $("#select_gears").slideDown('fast')
    }
    else
    {
        if ($( "#selected_transmission" ).hasClass('col-md-3'))
        {
            $( "#selected_transmission" ).removeClass( 'col-md-3');
        }
        else
        {
            $( "#selected_transmission" ).addClass( 'col-md-6');
        }
        $("#select_gears").slideUp('fast')
    }

    $('#transmission').on('change', function(){
        // Radio toggles will show base on Dropdown Change
        if(this.value == "Automatic")
        {
            if ($( "#selected_transmission" ).hasClass('col-md-3'))
            {
                $( "#selected_transmission" ).removeClass( 'col-md-3');
            }
            else
            {
                $( "#selected_transmission" ).addClass( 'col-md-6');
            }
            $("#select_gears").slideUp('fast')
        }
        else if(this.value == "Mannual")
        { 
            if ($( "#selected_transmission" ).hasClass('col-md-6'))
            {
                $( "#selected_transmission" ).removeClass( 'col-md-6');
            }
            else
            {
                $( "#selected_transmission" ).addClass( 'col-md-3');
            }
            $("#select_gears").slideDown('fast')
        }
        else
        {
            if ($( "#selected_transmission" ).hasClass('col-md-3'))
            {
                $( "#selected_transmission" ).removeClass( 'col-md-3');
            }
            else
            {
                $( "#selected_transmission" ).addClass( 'col-md-6');
            }
            $("#select_gears").slideUp('fast')
        }
    });
    
    function previewImages() {

        var $preview = $('#preview').empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
            return alert(file.name +" is not an image");
        } // else...

        var reader = new FileReader();

        $(reader).on("load", function() {
            $preview.append($("<img/>", {src:this.result, height:100}));
        });

        reader.readAsDataURL(file);

        }
    }
    $('#file-input').on("change", previewImages);

    </script>

</body>

</html>
