@extends('layouts.master')

@section('title')
    Parts
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
                        <h6 class="m-0 font-weight-bold text-primary">Records <small>({{$parts_ids->count()}})</small></h6>
                    </div>
                    <div class="col-md-5">
                        <a href="{{url('admin/history')}}" class="btn btn-info float-right">Back</a>
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
                                @foreach ($parts_ids as $part)
                                    <tr>
                                        <td>{{$part->userDetails->first_name}}</td>
                                        <td>{{$part->accessoryDetails->title}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        @if ($parts_ids->count() == 0)
                            <p class="text-danger text-center">Empty history...</p>
                        @endif
    
                        <div class="row m-2">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button onclick="clearHistory()" type="button" id="del_rows_btn" class="zoomBtn btn btn-danger btn-xs mt-2 btn-block" style="font-size: 15px;">Clear history</button>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function clearHistory()
        {
        
            var url = "{{ url('admin/history/parts/clearHistory') }}";
        
            swal({
                    title: "Do you want to empty it?",
                    text: "Clear",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: dltUrl,
                        type: "DELETE",
                        data:{
                            _token:'{{ csrf_token() }}',
                            id:'id'
                        }           
                    })
                    .done(function(response) {
                        swal({
                            title: "History deleted!",
                            text: "History deleted permanently",
                            icon: "success",
                            timer: 5000,
                            buttons: false,
                            dangerMode: true,
                        })
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    })
                }
                else {
                    swal("Cancelled", "Your history is safe :)", "error");
                }
            });
        }
    </script>
@endsection