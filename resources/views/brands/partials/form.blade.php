<form id="brandForm" action="{{$form_action}}" method="POST" enctype="multipart/form-data">
    
    <input type="hidden"  id="" name="brand_id" value="{{@$brand->id}}" placeholder="">
    
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{@$brand->title}}" placeholder="Enter title...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description" placeholder="Write..." maxlength="50">{{@$brand->description}}</textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="display_order" class="col-sm-2 col-form-label">Display order <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="display_order" name="display_order" value="{{@$brand->display_order}}" placeholder="Enter display order...">
        </div>
    </div>

    <div class="form-group row">
        <label for="rate" class="col-sm-2 col-form-label">Ratting <span class="red_star">*</span></label>
        <div class="col-sm-4">
            <select class="form-control" name="rate" id="rate">
                <option value="">--Select--</option>
                <option value="1" {{ @$brand->rate == 1 ? 'selected' : '' }}>1 Star</option>
                <option value="2" {{ @$brand->rate == 2 ? 'selected' : '' }}>2 Star</option>
                <option value="3" {{ @$brand->rate == 3 ? 'selected' : '' }}>3 Star</option>
                <option value="4" {{ @$brand->rate == 4 ? 'selected' : '' }}>4 Star</option>
                <option value="5" {{ @$brand->rate == 5 ? 'selected' : '' }}>5 Star</option>
                <option value="6" {{ @$brand->rate == 6 ? 'selected' : '' }}>6 Star</option>
                <option value="7" {{ @$brand->rate == 7 ? 'selected' : '' }}>7 Star</option>
            </select>
        </div>

        @if (@$brand->rate != null)
            <strong class="col-sm-1 col-form-label">Stars</strong>
            <div class="col-md-4 mt-2">
                @for ($i = 0; $i < @$brand->rate; $i++)
                    <li class="list-inline-item selected"><i class="fa fa-star text-primary"></i></li>
                @endfor
            </div>
        @endif
    </div>

    <input type="hidden" name="is_vehicle" value="1">

    <div class="form-group">
        <label for="">Logo <span class="red_star">*</span></label>
        <input accept="image/*" id="file-input" type="file" name="filename" class="p-1" @if (@$brand->logo == null) required @endif>
        
        <br>
        <br>

        @if (@$brand->logo != null)      
            <img src="{{asset('storage')}}/brands_logos/{{$brand->logo}}" height="20%" width="20%" />
        @endif
        
        <div id="preview"></div>
    </div>
    
    <button type="submit" id="submitBtn" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admin/brands')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>