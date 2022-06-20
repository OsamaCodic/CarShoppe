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
                <div class="row">
                   <div class="col-md-6">
                        <a href="{{url('admin/history/partsHistory')}}" type="button" class="btn btn-block btn-info rounded-pill btn-lg zoomBtn">Parts/Accessories<i class="fa fa-clock ml-2" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('admin/history/productsHistory')}}" type="button" class="btn btn-block btn-info rounded-pill btn-lg zoomBtn">Products <i class="fa fa-clock ml-2" aria-hidden="true"></i></a>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('products.partials.js')
@endsection