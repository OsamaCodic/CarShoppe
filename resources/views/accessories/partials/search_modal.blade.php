<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Advance filters</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
          <form id="advanceSearchForm" action="{{url('admin/advance_search_accessory')}}" method="get">
            {{ csrf_field() }}
            
            <div class="form-row mt-2">
              <label for="engine_cc" class="form-label p-1">Brand</label>
              <div class="col">
                <select class="form-control" name="brand_id" id="brand_id">
                  <option value="">--Select--</option>
                  
                  @foreach (@$brands as $brand)
                    <option value="{{@$brand->id}}">{{$brand->title}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-row mt-2">
              <label for="engine_cc" class="form-label p-1">Category</label>
              <div class="col">
                <select class="form-control" name="type_id" id="type_id">
                  <option value="">--Select--</option>
                  
                  @foreach (@$types as $type)
                    <option value="{{@$type->id}}">{{$type->title}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-row mt-2">
              <div class="col">
                <input type="text" name="colours" class="form-control" placeholder="Search by Colour">
              </div>
            </div>

            <div class="form-row mt-2">
              <label for="price" class="form-label p-1">Price range</label>
              <div class="col">
                <input type="number" id="price" name="low_price" class="form-control" placeholder="Low">
              </div>
              <div class="col">
                <input type="number" name="high_price" class="form-control" placeholder="High">
              </div>
            </div>     
            
            <div class="form-row mt-2">
              <label for="engine_cc" class="form-label p-1">Discount</label>
              <div class="col">
                <select class="form-control" name="discount" id="discount">
                  <option value="">--Select--</option>
                  <option value="10">10%</option>
                  <option value="20">20%</option>
                  <option value="25">25%</option>
                  <option value="30">30%</option>
                  <option value="50">50%</option>
                  <option value="70">70%</option>
                  <option value="75">75%</option>
                </select>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
          <button id="advanceSearchBtn" type="button" class="btn btn-success">Search <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </div>
