@extends('admin.layouts.master')

@section('title','Admin | Manage Exams')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Exams</li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-default py-2 d-flex justify-content-between align-items-center">
                <h4 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-circle"></i> Manage Exams
                </h4>
                <a href="{{ route('exam.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm btn-rounded" >
                    <i class="fa fa-plus"></i>&nbsp; Add Exam</a>
            </div>
            <div class="card-body">
                <div class="row">

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm js-dt" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Exam Type</th>
                            <th>Score</th>
                            <th>Grade</th>
                            @if (auth()->user()->type=='Admin')
                                <th class="text-center">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($exams as $exam)
                            <tr>
                                <td>{{ date_format(date_create($exam->date), 'd M Y')  }}</td>
                                <td>{{ $exam->std->name }}</td>
                                <td>{{ $exam->std->cls->class_name }}</td>
                                <td>{{ $exam->subject }}</td>
                                <td>{{ $exam->type->name }}</td>
                                <td>{{ $exam->score }}</td>
                                <td>{{ $exam->grade }}</td>
                                @if (auth()->user()->type=='Admin')
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{ route('exam.edit',$exam->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="deleteform d-inline-block" action="{{route('exam.destroy',$exam->id)}}" method="post">
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