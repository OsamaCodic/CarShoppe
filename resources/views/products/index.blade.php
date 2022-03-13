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
                {{-- <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$users->count()}})</small></h6> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>Name</th>
                                {{-- <th>Images</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->serial_nunber}}</td>
                                    <td>{{$product->brand_id}}</td>
                                    <td>{{$product->type_id}}</td>
                                    <td>{{$product->name}}</td>
                                    {{-- <td>
                                        <i class="fa fa-trash zoom" onclick="delete_user({{$user}})" aria-hidden="true" style="color: #bf1616"></i>
                                        <a href="{{ url('admin/users/'.$user->id.'/edit') }}" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('users.partials.js')
@endsection