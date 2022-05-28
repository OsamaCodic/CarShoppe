@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a href="{{url('admin/accessory_categories/create')}}" type="button" class="btn btn-block btn-primary rounded-pill btn-sm zoomBtn"><i class="fa fa-plus ml-2" aria-hidden="true"></i></a>
            </div>  
        </div>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        {{-- <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$types->count()}})</small></h6> --}}
                        <h6 class="m-0 font-weight-bold text-primary" id="total_records"></h6>
                    </div>
                    <div class="col-md-4">
                        {{-- <form action="{{url('admin/search_type')}}" method="get" role="search" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="search_title" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                    <a href="{{url('admin/types')}}" class="btn btn-danger" type="button">
                                        <i class="fas fa-times fa-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </form> --}}
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search by title..." />
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="brandTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                    {{-- @if (@$_GET['sortbyTitle'] == "ASC")
                                        <a href="{{url('admin/brands?sortbyTitle=DESC')}}"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a>
                                        @else
                                        <a href="{{url('admin/brands?sortbyTitle=ASC')}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a>
                                    @endif --}}
                                </th>
                                <th>Description</th>
                                <th>Display Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{$type->title}}</td>
                                    <td>{!! $type->description !!}</td>
                                    <td>{{$type->display_order}}</td>
                                    <td>
                                        <i class="fa fa-trash zoom" onclick="delete_type({{$type}})" aria-hidden="true" style="color: #bf1616"></i>
                                        <a href="{{ url('admin/types/'.$type->id.'/edit') }}" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                        <tbody>
                            {{-- Ajax Response render here --}}
                        </tbody>
                    </table>

                    {{-- @if ($types->count() == 0)
                        <p class="text-danger text-center">No types founds...</p>
                    @endif --}}
                </div>

                {{-- @if ($types->count() > 0)
                    <p>Showing {!! $types->firstItem() !!} to {!! $types->lastItem() !!}</p>
                    {{ $types->links() }}
                @endif --}}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('accessory_categories.partials.js')
@endsection