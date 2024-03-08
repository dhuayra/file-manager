@extends('layout.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Generate PDF</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header border-left-success">
                    <div class="font-weight-bold text-success">
                        Contact
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pdf.show') }}" method="POST" target="pdfFrame">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Age</label>
                            <input type="number" name="age" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Birth Date</label>
                            <input type="date" name="birth_date" class="form-control form-control-sm">
                        </div>
                        <input type="submit" value="Generate" class="btn btn-sm btn-outline-success">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header border-left-primary">
                    <div class="text-xs font-weight-bold text-primary">
                        Preview Document
                    </div>

                </div>
                <div class="card-body p-1">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe name="pdfFrame" frameborder="0" class="embed-responsive-item bg-gray-200 h-100"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    
@endsection