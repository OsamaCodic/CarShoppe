<form id="productForm" action="{{$form_action}}" method="POST" enctype="multipart/form-data">

    <input type="hidden"  id="" name="product_id" value="{{@$product->id}}" placeholder="">

    @if (@$product->id)
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('admin/product/'.@$product->id.'/edit_features')}}" type="button" class="btn btn-info mb-3 float-right">Edit Features</a>
            </div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="brand">Brand <span class="red_star">*</span></label>
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
                <label for="type">Type <span class="red_star">*</span></label>
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
                <label for="name">Name <span class="red_star">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{@$product->name}}" placeholder="Enter product name...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="model">Model <span class="red_star">*</span></label>
                <input type="number" min="1885" max="2022" class="form-control" id="model" name="model" value="{{@$product->model}}" placeholder="2015...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="engine_cc">Engine cc <span class="red_star">*</span></label>
                <select class="form-control" name="engine_cc" id="engine_cc">
                    <option value="">--Select--</option>
                    <option value="660" {{ @$product->engine_cc == 660 ? 'selected' : '' }}>660</option>
                    <option value="800" {{ @$product->engine_cc == 800 ? 'selected' : '' }}>800</option>
                    <option value="1000" {{ @$product->engine_cc == 1000 ? 'selected' : '' }}>1000</option>
                    <option value="1300" {{ @$product->engine_cc == 1300 ? 'selected' : '' }}>1300</option>
                    <option value="1500" {{ @$product->engine_cc == 1500 ? 'selected' : '' }}>1500</option>
                    <option value="1800" {{ @$product->engine_cc == 1800 ? 'selected' : '' }}>1800</option>
                    <option value="2000" {{ @$product->engine_cc == 2000 ? 'selected' : '' }}>2000</option>
                    <option value="2500" {{ @$product->engine_cc == 2500 ? 'selected' : '' }}>2500</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="top_speed">Top Speed (km/h)</label>
                <input type="number" class="form-control" id="top_speed" name="top_speed" value="{{@$product->top_speed}}" placeholder="Max speed...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fuel_tank_capacity">Fuel Tank capacity</label>
                <input type="number" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" value="{{@$product->fuel_tank_capacity}}" placeholder="Enter Fuel tank capacity...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fuel_avg">Fuel average <span class="red_star">*</span></label>
                <input type="number" class="form-control" id="fuel_avg" name="fuel_average" value="{{@$product->fuel_average}}" placeholder="Approximately average...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="display_order">Display Order <span class="red_star">*</span></label>
                <input type="number" class="form-control" id="display_order" name="display_order" value="{{@$product->display_order}}" maxlength="5" placeholder="Enter product list order...">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="no_of_doors">No of Doors <span class="red_star">*</span></label>
                <select class="form-control" name="no_of_doors" id="no_of_doors">
                    <option value="">--Select--</option>
                    <option value="2" {{ @$product->no_of_doors == 2 ? 'selected' : '' }}>2 Doors</option>
                    <option value="4" {{ @$product->no_of_doors == 4 ? 'selected' : '' }}>4 Doors</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="weight">Weight (kg)</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{@$product->weight}}" placeholder="Enter weight...">
            </div>
        </div>
        <div class="col-md-6" id="selected_transmission">
            <div class="form-group">
                <label for="transmission">Transmission <span class="red_star">*</span></label>
                <select class="form-control" name="transmission" id="transmission">
                    <option value="">--Select--</option>
                    <option value="Automatic" {{ @$product->transmission == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                    <option value="Mannual" {{ @$product->transmission == 'Mannual' ? 'selected' : '' }}>Mannual</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div id="select_gears" class="form-group" style="display: none">
                <label for="gears">Gears <span class="red_star">*</span></label>
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
        <div class="col-md-3">
            <div id="select_gears" class="form-group" style="display: none">
                <label for="gears">Gears <span class="red_star">*</span></label>
                <select class="form-control" name="gears" id="gears">
                    <option value="">--Select--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="price">Price (Rs) <span class="red_star">*</span></label>
                <input type="number" class="form-control" id="price" name="price" value="{{@$product->price}}" placeholder="Price in rupees">
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label for="ground_clearance">Ground Clearance (Inches)</label>
                <input type="number" class="form-control" id="ground_clearance" name="ground_clearance" value="{{@$product->ground_clearance}}" placeholder="Road Clearance...">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="dimensions">Dimension (ft)</label>
                <div class="row">

                    <?php
                        @$dimensionsArray = explode (" x ", @$product->dimensions);    
                    ?>

                    <div class="col">
                      <input type="number" class="form-control" id="dimensions" name="dimensions[]" value="{{@$dimensionsArray[0]}}" placeholder="Length">
                    </div>
                    
                    <strong class="mt-1">x</strong>

                    <div class="col">
                      <input type="number" class="form-control" id="dimensions" name="dimensions[]" value="{{@$dimensionsArray[1]}}" placeholder="Width">
                    </div>

                    <strong class="mt-1">x</strong>
                    
                    <div class="col">
                      <input type="number" class="form-control" id="dimensions" name="dimensions[]" value="{{@$dimensionsArray[2]}}" placeholder="Height">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="varients">Varients <span class="red_star">*</span></label>
                <textarea class="form-control" id="varients" name="varients" placeholder="Press enter after one" rows="4">{{@$product->varients}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="colours">Colours</label>
                <textarea class="form-control" id="colours" name="colours" placeholder="Press enter after one" rows="4">{{@$product->colours}}</textarea>
            </div>
        </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter..." maxlength="50">{{@$product->description}}</textarea>
            </div>
        </div>
    </div>

    <input type="hidden" name="status" value="1">

    <br>
    <div class="form-group">
        <label for="">Pictures <span class="red_star">*</span></label>
        <input accept="image/*" id="file-input" type="file" name="filename[]" class="p-1" multiple @if (@$product->productImages == null) required @endif>

        <br>
        @if (@$product->productImages != null)      
            @foreach ($product->productImages as $image)
                <img src="{{asset('storage')}}/images/{{$image->image_name}}" height="20%" width="20%" />
            @endforeach
        @endif
        
        <div id="preview"></div>
    </div>

    <button type="submit" id="submitBtn" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admin/products')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>
