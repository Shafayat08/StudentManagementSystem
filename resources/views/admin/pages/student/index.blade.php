@extends('admin.layouts.master')

@section('title','Admin | Students Information')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student Information</li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-default py-2 d-flex justify-content-between align-items-center">
                <h4 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-circle"></i> Student Information
                </h4>
                <a href="{{ route('students.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm btn-rounded" >
                    <i class="fa fa-plus"></i>&nbsp; Add Student </a>
            </div>
            <div class="card-body">
                <div class="row">

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm js-dt" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            @if (auth()->user()->type=='Admin')
                                <th class="text-center">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->cls->class_name }}</td>
                                <td>{{ $student->f_name }}</td>
                                <td>{{ $student->m_name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->phone }}</td>
                                @if (auth()->user()->type=='Admin')
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{ route('students.edit',$student->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="deleteform d-inline-block" action="{{route('students.destroy',$student->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger deletebtn">
                                            <span class="btn-label">
                                              <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('/')}}admin/js/croppie.js"></script>
    <script>
        
        function captureDivContentAsImage() {
    const divToCapture = document.getElementById("contentToDownload");
    const button = document.getElementById("downloadButton");
    const html2canvas = require('html2canvas');
    html2canvas(divToCapture).then(function (canvas) {
        const imgData = canvas.toDataURL("image/png");
        const a = document.createElement("a");
        a.href = imgData;
        a.download = "downloaded_image.png";
        a.click();
    });
}

// Add an event listener to the download button
const downloadButton = document.getElementById("downloadButton");
downloadButton.addEventListener("click", captureDivContentAsImage);
        </script>
@endsection