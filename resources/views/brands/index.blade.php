@extends('layouts.master')

@section('title')
    Brands
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">All Brands</h1>
            </div>
            <div class="col-md-2">
                <a href="{{url('admin/brands/create')}}" type="button" class="btn btn-block btn-primary rounded-pill btn-sm zoomBtn"><i class="fa fa-plus ml-2" aria-hidden="true"></i></a>
            </div>  
        </div>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$brands->count()}})</small></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="brandTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Display Order</th>
                                {{-- <th>Logo</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{$brand->title}}</td>
                                    <td>{{$brand->description}}</td>
                                    <td>{{$brand->display_order}}</td>
                                    <td>
                                        <i class="fa fa-trash zoom" onclick="delete_brand({{$brand}})" aria-hidden="true" style="color: #bf1616"></i>
                                        <a href="{{ url('admin/brands/'.$brand->id.'/edit') }}" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($brands->count() == 0)
                        <p class="text-danger text-center">No brands founds...</p>
                    @endif
                </div>

                @if ($brands->count() > 0)
                    {{-- {{ $users->links() }} --}}
                    <p>Showing {!! $brands->firstItem() !!} to {!! $brands->lastItem() !!}</p>
                    {{ $brands->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('brands.partials.js')
@endsection