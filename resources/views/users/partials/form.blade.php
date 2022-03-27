<form id="userForm" action="{{$form_action}}" method="{{$form_method}}">
    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{@$user->first_name}}" placeholder="Enter first name...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{@$user->last_name}}" placeholder="Enter last name...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{@$user->email}}" placeholder="Enter Email...">
        </div>
    </div>
   
    <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <select class="form-control" name="role" id="role">
                <option value="">--Select--</option>
                <option value="1" {{ @$user->role == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ @$user->role == 2 ? 'selected' : '' }}>Customer</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password <span class="red_star">*</span></label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password...">
        </div>
    </div>

    <input type="hidden" id="userID" value="{{@$user->id}}">

    <button type="submit" id="submitBtn" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admin/users')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>