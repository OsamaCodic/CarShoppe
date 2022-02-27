@extends('layouts.master')

@section('title')
    User | Create
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">User</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 {{$card_bg}}">
                <h6 class="m-0 font-weight-bold text-light">{{$card_title}}</h6>
            </div>
            <div class="card-body">
                @include('users.partials.form')
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('users.partials.js')
@endsection