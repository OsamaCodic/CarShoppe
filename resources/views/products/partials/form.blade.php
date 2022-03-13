<form id="productForm" action="{{$form_action}}" method="{{$form_method}}">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="brand">Brand</label>
                <select class="form-control" name="brand_id" id="brand">
                    <option value="">--Select--</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type_id" id="type">
                    <option value="">--Select--</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter product name...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="model">Model</label>
                <input type="number" class="form-control" id="model" name="model" value="" placeholder="2015...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="engine_cc">Engine cc</label>
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
                <label for="top_speed">Top Speed</label>
                <input type="number" class="form-control" id="top_speed" name="top_speed" value="" placeholder="Max speed...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fuel_tank_capacity">Fuel Tank capacity</label>
                <input type="number" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" value="" placeholder="Enter Fuel tank capacity...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fuel_avg">Fuel average</label>
                <input type="number" class="form-control" id="fuel_avg" name="fuel_average" value="" placeholder="Approximately average...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="display_order">Display Order</label>
                    <input type="number" class="form-control" id="display_order" name="display_order" value="" maxlength="5" placeholder="Enter product list order...">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="no_of_doors">No of Doors</label>
                <select class="form-control" name="no_of_doors" id="no_of_doors">
                    <option value="">--Select--</option>
                    <option value="2">2 Doors</option>
                    <option value="4">4 Doors</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" id="weight" name="weight" value="" placeholder="Enter weight...">
            </div>
        </div>
        <div class="col-md-6" id="selected_transmission">
            <div class="form-group">
                <label for="transmission">Transmission</label>
                <select class="form-control" name="transmission" id="transmission">
                    <option value="">--Select--</option>
                    <option value="Automatic">Automatic</option>
                    <option value="Mannual">Mannual</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div id="select_gears" class="form-group" style="display: none">
                <label for="gears">Gears</label>
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
                <label for="price">Price (Rs)</label>
                <input type="number" class="form-control" id="price" name="price" value="" placeholder="Price in rupees">
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label for="ground_clearance">Ground Clearance</label>
                <input type="number" class="form-control" id="ground_clearance" name="ground_clearance" value="" placeholder="Road Clearance...">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="dimensions">Dimension</label>
                <div class="row">
                    <div class="col">
                      <input type="number" class="form-control" id="dimensions" name="dimensions[]" placeholder="Length">
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" id="dimensions" name="dimensions[]" placeholder="Width">
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" id="dimensions" name="dimensions[]" placeholder="Height">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="varients">Varients</label>
                <textarea class="form-control" id="varients" name="varients" placeholder="Eg, varient 1, varient 2, varient 3, ..." rows="4"></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="colours">Colours</label>
                <textarea class="form-control" id="colours" name="colours" placeholder="Eg, Red, Blue, Black, ..." rows="4"></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter..." rows="4"></textarea>
            </div>
        </div>
    </div>

    <input type="hidden" name="status" value="1">

    <button type="submit" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admin/products')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>
