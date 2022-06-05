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
        <div class="modal-body ml-3">
            
          <form id="advanceSearchForm" action="{{url('admin/advance_search_product')}}" method="get">
            {{ csrf_field() }}
            
            <div class="form-row mt-2">
              <div class="col">
                <select class="form-control" name="brand_id" id="brand">
                  <option value="">--Search by Brand--</option>
                  @foreach (@$brands as $brand)
                    <option value="{{@$brand->id}}">{{$brand->title}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col">
                <select class="form-control" name="brand_id" id="brand">
                  <option value="">--Search by Type--</option>
                  @foreach (@$types as $type)
                    <option value="{{@$type->id}}">{{$type->title}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-row mt-2">
              <div class="col">
                <input type="number" min="1885" max="2022" name="model" class="form-control" minlength="4" placeholder="Search by Model year">
              </div>
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
              <label for="engine_cc" class="form-label p-1">Search by Engine cc</label>
              <div class="col">
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

              <label for="engine_cc" class="form-label p-1">Gears</label>
              <div class="col">
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
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
          <button id="advanceSearchBtn" type="button" class="btn btn-success">Search <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </div>
