@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-SUCCESS text-uppercase mb-1">
                                Brands (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_brands}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Car Types (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_types}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Vechiles (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_products}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_users}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Row -->                    
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">CarShoppe - {{ __('You are logged in!') }}</h6>
                </div>
                <div class="card-body">
                    <p>The project will be web based where you will shop online for a new or used car that you would
                        be interested in buying. After you have chosen the vehicle you would like to buy you will need
                        to record some specific information about your future vehicle.
                    </p>
                    <p class="mb-0"> 
                        CarWeb has helped millions of Pakistanis buy & sell automobiles, read automotive reviews, check automotive prices and find solutions to all of their automotive needs, People can Buy new cars and also used cars here, they can search there Car or bike or other type of vehicle with advanced filters in easy steps ,He can explain and rate his car according to his experience and give feedback and rating, CarWeb provide Auto Parts (E-com) Online Shop, User can order them with free delivery
                        People need the best and most suitable car according to their price range. CarWeb provides a lot of features that help to find the best car. He can select various types of vehicles to find your best ride in easy steps. 
                        Aim & Objective is To produce a web-based system that allows customers to register and Buy New or Used cars online.
                    </p>
                </div>
            </div>
        </div>
        {{-- @yield('content') --}}
    </div>     
    <!-- Content Row -->
@endsection
