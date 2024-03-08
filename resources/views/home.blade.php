@extends('layout.app')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    
                    <h6 class="m-0 font-weight-bold text-success">Generate PDF</h6>
                    <p>This web application features a PDF generation function using the FPDF library. 
                        This function allows users to convert form input into downloadable PDF documents.</p>
                    <hr>

                    <h6 class="m-0 font-weight-bold text-success">File Upload</h6>
                    <p>This web application, we've implemented a file upload feature with detailed descriptions for each file. 
                        Users can easily upload files and provide accompanying descriptions. 
                        Additionally, we display a list of uploaded files, making it convenient for users to manage their uploads.
                    </p>
                    <hr>
                    <h6 class="m-0 font-weight-bold text-success">Data CSV</h6>
                    <p>This web application facilitates seamless data management with import, export, and data table display functionalities.
                         Users can effortlessly import data into the system, export it as needed, and view it neatly organized in interactive data tables.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

    
@endsection