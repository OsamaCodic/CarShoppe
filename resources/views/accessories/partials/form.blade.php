<form id="accessoryForm" action="{{$form_action}}" method="POST" enctype="multipart/form-data">

    <input type="hidden"  id="" name="accessory_id" value="{{@$accessory->id}}" placeholder="">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="brand">Brand <span class="red_star">*</span></label>
                <select class="form-control" name="brand_id" id="brand">
                    <option value="">--Select--</option>

                    @foreach (@$brands as $brand)
                        <option value="{{@$brand->id}}" {{ @$accessory->brand_id == @$brand->id ? 'selected' : '' }}>{{$brand->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="type">Category <span class="red_star">*</span></label>
                <select class="form-control" name="category_id" id="type">
                    <option value="">--Select--</option>
                    
                    @foreach ($types as $type)
                        <option value="{{@$type->id}}" {{ @$accessory->category_id == @$type->id ? 'selected' : '' }}>{{$type->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Title <span class="red_star">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{@$accessory->title}}" placeholder="Enter title...">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="dimensions">Dimension (mm)</label>
                <div class="row">

                    <?php
                        @$dimensionsArray = explode (" x ", @$accessory->dimensions);    
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
        <div class="col-md-2">
            <div class="form-group">
                <label for="display_order">Price <span class="red_star">*</span></label>
                <input type="number" class="form-control" id="display_order" name="price" value="{{@$accessory->display_order}}" maxlength="5" placeholder="Enter accessory list order...">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="weight">Weight (Gram)</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{@$accessory->weight}}" placeholder="Enter weight...">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="display_order">Display Order <span class="red_star">*</span></label>
                <input type="number" class="form-control" id="display_order" name="display_order" value="{{@$accessory->display_order}}" maxlength="5" placeholder="Enter accessory list order...">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="colours">Colours <span class="red_star">*</span></label>
                <textarea class="form-control" id="colours" name="colours" placeholder="Press enter after one" rows="3">{{@$accessory->colours}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter..." maxlength="50">{{@$accessory->description}}</textarea>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-2">
            <div class="form-group">
                <label for="gears">Tax <span class="red_star">*</span></label>
                <select class="form-control" name="tax" id="tax">
                    <option value="2" {{ @$accessory->tax == 2 ? 'selected' : '' }}>2%</option>
                    <option value="5" {{ @$accessory->tax == 5 ? 'selected' : '' }}>5%</option>
                    <option value="7" {{ @$accessory->tax == 7 ? 'selected' : '' }}>7%</option>
                    <option value="10" {{ @$accessory->tax == 10 ? 'selected' : '' }}>10%</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="gears">Discount</label>
                <select class="form-control" name="discount" id="discount">
                    <option value="">--Select--</option>
                    <option value="10" {{ @$accessory->discount == 10 ? 'selected' : '' }}>10%</option>
                    <option value="20" {{ @$accessory->discount == 20 ? 'selected' : '' }}>20%</option>
                    <option value="25" {{ @$accessory->discount == 25 ? 'selected' : '' }}>25%</option>
                    <option value="30" {{ @$accessory->discount == 30 ? 'selected' : '' }}>30%</option>
                    <option value="50" {{ @$accessory->discount == 50 ? 'selected' : '' }}>50%</option>
                    <option value="70" {{ @$accessory->discount == 70 ? 'selected' : '' }}>70%</option>
                    <option value="75" {{ @$accessory->discount == 75 ? 'selected' : '' }}>75%</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="display_order">Availible Qty</label>
                <input type="number" class="form-control" id="availible_quantity" name="availible_quantity" value="{{@$accessory->availible_quantity}}" maxlength="5" placeholder="Quantity">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="display_order">Release date <span class="red_star">*</span></label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{@$accessory->release_date}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="display_order">Delivery date</label>
                <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{@$accessory->delivery_date}}" maxlength="5" placeholder="Enter accessory list order...">
            </div>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label for="">Picture <span class="red_star">*</span></label>
        <input accept="image/*" id="file-input" type="file" name="filename" class="p-1" @if (@$accessory->image_name == null) required @endif>

        <br>

        @if (@$accessory->image_name != null)      
            <img src="{{asset('storage')}}/accessories_Images/{{$accessory->image_name}}" height="20%" width="20%" />
        @endif
        
        <div id="preview"></div>
    </div>

    <button type="submit" id="submitBtn" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admin/accessories')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>
