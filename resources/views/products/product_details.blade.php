@extends('layouts.master')

@section('title')
    Product
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">About Product</h1>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12"><h3>Brand: </h3></div>
                    <div class="col-md-12"><h3>Name: {{$product->name}} <small class="text-danger">(Rs - {{$product->price}})</small></h3></div>
                    <div class="col-md-6"><strong>Type: </strong></div>
                    <div class="col-md-6"><strong>Serial No: </strong>{{$product->serial_nunber}}</div>
                    <div class="col-md-6"><strong>Model: </strong>{{$product->model}}</div>
                    <div class="col-md-6"><strong>Doors: </strong>{{$product->no_of_doors}}</div>
                    <div class="col-md-6"><strong>Varients: </strong>{{$product->varients}}</div>
                    <div class="col-md-6"><strong>Colours: </strong>{{$product->colours}}</div>
                    <div class="col-md-6"><strong>Engine CC: </strong>{{$product->engine_cc}}</div>
                    <div class="col-md-6"><strong>Dimensions: </strong>{{$product->dimensions}} (ft)</div>
                    <div class="col-md-6"><strong>Ground Clearance: </strong>{{$product->ground_clearance}}''</div>
                    <div class="col-md-6"><strong>Weight: </strong>{{$product->weight}} kg</div>
                    <div class="col-md-6"><strong>Transmission: </strong>{{$product->transmission}}</div>
                    @if ($product->transmission == 'Mannual')
                        <div class="col-md-6"><strong>Gears: </strong>{{$product->gears}}</div>
                    @endif
                    <div class="col-md-6"><strong>Top Speed: </strong>{{$product->top_speed}} km/h</div>
                    <div class="col-md-6"><strong>Fuel Average: </strong>{{$product->fuel_average}} km/l</div>
                    <div class="col-md-6"><strong>Fuel Tank Capacity: </strong>{{$product->fuel_tank_capacity}} Litres</div>
                    <div class="col-md-6"><strong>Status: </strong>@if ($product->status) New Car @else Used Car @endif</div>
                </div>
                <br>
                <a href="{{url('admin/products')}}" type="button" class="btn btn-outline-secondary rounded-pill themeBtn"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
@endsection