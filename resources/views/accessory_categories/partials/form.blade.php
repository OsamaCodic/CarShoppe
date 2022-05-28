<form id="accessorycategoryForm" action="{{$form_action}}" method="{{$form_method}}">
    
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{@$type->title}}" placeholder="Enter title...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description" placeholder="Write..." maxlength="50">{{@$type->description}}</textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="display_order" class="col-sm-2 col-form-label">Display order <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="display_order" name="display_order" value="{{@$type->display_order}}" placeholder="Enter display order...">
        </div>
    </div>
    
    <input type="hidden" name="is_vehicle" value="0"> 
    
    <button type="submit" id="submitBtn" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admin/accessory_categories')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>