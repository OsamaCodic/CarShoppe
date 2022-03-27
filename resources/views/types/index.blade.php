@extends('layouts.master')

@section('title')
    Types
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="row mb-2">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">All Types</h1>
            </div>
            <div class="col-md-2">
                <a href="{{url('admin/types/create')}}" type="button" class="btn btn-block btn-primary rounded-pill btn-sm zoomBtn"><i class="fa fa-plus ml-2" aria-hidden="true"></i></a>
            </div>  
        </div>
        
        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$types->count()}})</small></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="brandTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Display Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{$type->title}}</td>
                                    <td>{{$type->description}}</td>
                                    <td>{{$type->display_order}}</td>
                                    <td>
                                        <i class="fa fa-trash zoom" onclick="delete_type({{$type}})" aria-hidden="true" style="color: #bf1616"></i>
                                        <a href="{{ url('admin/types/'.$type->id.'/edit') }}" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($types->count() == 0)
                        <p class="text-danger text-center">No types founds...</p>
                    @endif
                </div>

                @if ($types->count() > 0)
                    {{-- {{ $users->links() }} --}}
                    <p>Showing {!! $types->firstItem() !!} to {!! $types->lastItem() !!}</p>
                    {{ $types->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('types.partials.js')
@endsection