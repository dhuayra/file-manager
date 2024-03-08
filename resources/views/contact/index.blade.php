@extends('layout.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Managment</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card shadow border-left-primary">
                <div class="card-body">
                    <form action="{{route('data.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between align-content-sm-between">
                            <input type="file" name="csv_file" id="" class="">
                            <input type="submit" value="Import" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow h-100">
                <div class="card-header border-left-success">
                    <div class="row justify-content-between align-content-sm-between">
                        <div class="font-weight-bold text-success">
                            Contact List
                        </div>
                        <a href="{{ route('data.export') }}" class="btn btn-sm btn-success">Export</a>
                    </div>
                </div>
                <div class="card-body p-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               <th>{{__('Name')}}</th> 
                               <th>{{__('Phone')}}</th>
                               <th>{{__('Email')}}</th>
                               <th>{{__('Age')}}</th>
                               <th>{{__('Birth Date')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->age}}</td>
                                    <td>{{$item->birth_date}}</td>
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