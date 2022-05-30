@extends('layouts.master')

@section('title')
    Accessory
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">About accessory</h1>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src='{{asset('storage')}}/accessories_Images/{{@$accessory->image_name}}' class="d-block w-100" width="10%" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-light">
                            <p><strong>Description</strong></p>
                                @if ($accessory->description != null)
                                    {{$accessory->description}}
                                @else
                                    <div class="text-danger">N/A</div>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12"><h3>Brand: {{@$accessory->brand->title}}</h3></div>
                    <div class="col-md-12"><h3>Name: {{$accessory->title}} <small class="text-danger">(Rs - {{$accessory->price}})</small></h3></div>
                    <div class="col-md-6"><strong>Category: </strong>{{@$accessory->type->title}}</div>
                    <div class="col-md-6"><strong>Colours: </strong>{{$accessory->colours}}</div>
                    <div class="col-md-6 text-primary"><strong>Tax: </strong>{{$accessory->tax}}%</div>
                    <div class="col-md-6 text-success"><strong>Discounts: </strong>{{$accessory->discount}}%</div>
                    <div class="col-md-6"><strong>Dimensions: </strong>{{$accessory->dimensions}} (mm)</div>
                    <div class="col-md-6"><strong>Weight: </strong>{{$accessory->weight}} Gram</div>
                    <div class="col-md-6"><strong>Total Availibility: </strong>{{$accessory->availible_quantity}}</div>
                    
                    <div class="col-md-6"><strong>Release date: </strong>{{$accessory->release_date}}</div>
                    <div class="col-md-6"><strong>Delivery date: </strong>{{$accessory->release_date}}</div>
                    
                </div>
                <br>
                <a href="{{url('admin/accessories')}}" type="button" class="btn btn-outline-secondary rounded-pill themeBtn"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
@endsection