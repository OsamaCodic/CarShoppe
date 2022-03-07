<form id="userForm" action="{{$form_action}}" method="{{$form_method}}">
    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{@$user->first_name}}" placeholder="Enter first name...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{@$user->last_name}}" placeholder="Enter last name...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{@$user->email}}" placeholder="Enter Email...">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter Password...">
        </div>
    </div>

    <button type="submit" class="btn {{$form_btn_class}} rounded-pill themeBtn zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
    <a href="{{url('admins/users')}}" type="button" class="btn btn-outline-secondary rounded-pill ml-3 themeBtn zoomCancelBtn">Cancel <i class="fa fa-times ml-2" aria-hidden="true"></i></a>
</form>