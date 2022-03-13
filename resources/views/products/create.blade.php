@extends('layouts.master')

@section('title')
    Product | Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">Product</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 {{$card_bg}}">
                <h6 class="m-0 font-weight-bold text-light">{{$card_title}}</h6>
            </div>
            <div class="card-body">
                @include('products.partials.form')
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('products.partials.js')
@endsection