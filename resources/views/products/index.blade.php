@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">All Products</h1>
            </div>
            <div class="col-md-2">
                <a href="{{url('admin/products/create')}}" type="button" class="btn btn-block btn-primary rounded-pill btn-sm zoomBtn"><i class="fa fa-plus ml-2" aria-hidden="true"></i></a>
            </div>  
        </div>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$products->count()}})</small></h6>
                    </div>
                    <div class="col-md-5">
                        <form action="{{url('admin/search_product')}}" method="get" role="search" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="name" class="form-control bg-white border-0 small" placeholder="Search by name" aria-label="Search" aria-describedby="basic-addon2">
                                
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Advance</button>
                                    <a href="{{url('admin/products')}}" class="btn btn-danger" type="button"><i class="fas fa-times fa-sm"></i></a>
                                </div>
                            </div>
                        </form>
                        @include('products.partials.search_modal')
                    </div>
                </div>
            </div>

            @if ($products->count() > 0)
                <div class="row mt-3 mr-1">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <small id="checkbox_delete_Label" class="text-secondary"><b>Delete Selected rows</b></small>
                        <div class="pull-right">
                            <label class="switch">
                                <input class="toggle-class" type="checkbox" id="delete_selected" onclick="deleletCheckboxes()">
                                <span class="redSlider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table id="productTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>
                                    Name
                                    @if (@$_GET['sortbyName'] == "ASC")
                                        <a href="{{url('admin/products?sortbyName=DESC')}}"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                                        @else
                                        <a href="{{url('admin/products?sortbyName=ASC')}}"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                                    @endif
                                </th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->serial_nunber}}</td>
                                    <td>{{@$product->brand->title}}</td>
                                    <td>{{@$product->type->title}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <img src="{{asset('storage')}}/images/{{@$product->productImages[0]->image_name}}" height="100%" width="100%" />
                                    </td>
                                    <td>
                                        <i class="fa fa-trash zoom delete" onclick="delete_product({{$product}})" aria-hidden="true" style="color: #bf1616" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                        <a href="{{ url('admin/products/'.$product->id) }}"  target="_blank" ><i class="fa fa-eye ml-2 zoom" aria-hidden="true" style="color: #7d9eff" data-toggle="tooltip" data-placement="top" title="Details"></i></a>
                                        <input class="form-check-input zoom" type="checkbox" id="delete_rows" name="delete_rows[]" value="{{$product->id}}" style="display:none; margin-top: 6px; margin-left: 13px;">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if ($products->count() == 0)
                        <p class="text-danger text-center">No products founds...</p>
                    @endif

                    <div class="row m-2">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <a href="#" type="button" id="del_rows_btn" class="zoomBtn btn btn-danger btn-xs mt-2 btn-block" style="font-size: 8px; display:none;">Delete</a>
                        </div>
                    </div>
                </div>

                @if ($products->count() > 0)
                    {{-- {{ $users->links() }} --}}
                    <p>Showing {!! $products->firstItem() !!} to {!! $products->lastItem() !!}</p>
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('products.partials.js')
@endsection