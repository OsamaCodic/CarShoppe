@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">History</h1>
            </div>
        </div>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-7">
                        {{-- <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$products->count()}})</small></h6> --}}
                    </div>
                    
                </div>
            </div>


            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="productTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Purchased</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products_ids as $product)
                                    <tr>
                                        <td>{{$product->userDetails->first_name}}</td>
                                        <td>{{$product->productDetails->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        @if ($products_ids->count() == 0)
                            <p class="text-danger text-center">Empty history...</p>
                        @endif
    
                        <div class="row m-2">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <a href="#" type="button" id="del_rows_btn" class="zoomBtn btn btn-danger btn-xs mt-2 btn-block" style="font-size: 8px; display:none;">Delete</a>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('products.partials.js')
@endsection