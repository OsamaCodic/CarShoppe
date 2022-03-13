<form id="featuresForm" action="{{$form_action}}" method="{{$form_method}}">
    <div class="row">
        <table class="table table-striped table-light">
            <thead>
              <tr>
                <th scope="col">List</th>
                <th scope="col">Select</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($features_list as $feature)  
                    <tr>
                        <td>
                            {{$feature->title}}
                        </td>
                        <td>
                            <label class="switch">
                                <input class="toggle-class" type="checkbox" id="" name="feature[]" value="{{$feature->id}}" >
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <input type="hidden" name="product_id" value="{{$product->id}}">

    <div class="row m-3">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <button type="submit" class="btn btn-block {{$form_btn_class}} rounded-pill zoomBtn"  style="">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
        </div>
        <div class="col-md-1"></div>
    </div>
</form>

