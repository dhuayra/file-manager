@extends('layout.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Files</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card shadow border-left-primary">
                <div class="card-body">
                    <form action="{{ route('file.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between align-content-sm-between">
                            <input type="file" name="document" id="" class="">
                            <input type="submit" value="Add" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow h-100">
                <div class="card-header border-left-success">
                    <div class="font-weight-bold text-success">
                        Files
                    </div>
                </div>
                <div class="card-body p-1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('#')}}</th> 
                                <th>{{__('File name')}}</th> 
                               <th>{{__('Format')}}</th>
                               <th>{{__('Size')}}</th>
                               <th>{{__('Date')}}</th>
                               <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $i  => $item)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->format}}</td>
                                    <td>{{$item->size}}</td>
                                    <td>{{$item->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ asset('storage/documents/'.$item->name) }}" target="_blank">show</a>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
</div>

    
@endsection