@extends('admin.layouts.master')

@section('title','User | Edit')

@section('styles')
    <link href="{{ asset('/')}}admin/css/croppie.css" rel="stylesheet"/>
@endsection

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Manage User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-white">
                    <i class="fas fa fa-desktop"></i> Edit User
                </h6>

            </div>
            <form id="ajaxForm" class="" action="{{route('user.update',$users->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                <input id="from" type="text" class="form-control" name="name" value="{{ $users->name }}"  placeholder="">
                                <p id="err-from" class="mb-0 text-danger small em"></p>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Role<span class="text-danger">*</span></label>
                                <div class="controls" name="type">
                                    <select name="type" id="" class="form-control">
                                        <option value="">Select Role</option>
                                        <option value="Leader" {{ $users->type=='Leader' ? 'selected' : '' }}>Tour Leader</option>
                                        <option value="Passenger" {{ $users->type=='Passenger' ? 'selected' : '' }}>Passenger</option>
                                        <option value="Supplier" {{ $users->type=='Supplier' ? 'selected' : '' }}>Airline  Ticket Provider / Supplier</option>
                                        <!-- <option value="Admin" {{ $users->type=='Admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Host" {{ $users->type=='Host' ? 'selected' : '' }}>Tour Host</option>
                                        <option value="Airline" {{ $users->type=='Airline' ? 'selected' : '' }}>Airline</option>
                                        <option value="Hotel" {{ $users->type=='Hotel' ? 'selected' : '' }}>Hotel</option>
                                        <option value="Guide" {{ $users->type=='Guide' ? 'selected' : '' }}>Guide</option>
                                        <option value="Sights" {{ $users->type=='Sights' ? 'selected' : '' }}>Sights</option> -->
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Phone<span class="text-danger">*</span></label>
                                <input id="from" type="text" class="form-control" name="phone" value="{{ $users->phone }}"  placeholder="">
                                <p id="err-from" class="mb-0 text-danger small em"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Email<span class="text-danger">*</span></label>
                                <input id="from" type="email" class="form-control" name="email" value="{{ $users->email }}"  placeholder="">
                                <p id="err-from" class="mb-0 text-danger small em"></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Password<span class="text-danger">*</span></label>
                                <input id="from" type="password" class="form-control" name="password" value=""  placeholder="">
                                <p id="err-from" class="mb-0 text-danger small em"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12"></div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                            <button type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-block"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection


@section('scripts')
    <script src="{{ asset('/')}}admin/js/croppie.js"></script>

    <script>

        /* show file value after file select */
        /*   document.querySelector('.custom-file-input').addEventListener('change',function(e){
               var fileName = document.getElementById("upload_image").files[0].name;
               var nextSibling = e.target.nextElementSibling;
               nextSibling.innerText = fileName;
           });*/

        //================= Image Upload and resize ===================
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square' //circle
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#upload_image').on('change', function (e) {
            var reader = new FileReader();
            reader.onload = (e) => {
                $('#uploaded_image').html('<img src="'+e.target.result+'" class="img-thumbnail mb-3" style="width:200px; height:220px" />');
                $('.js-avatar').val(this.files[0]);
            }
            reader.readAsDataURL(this.files[0]);

            $('.custom-file-label').text(this.files[0].name);
        });


        $('.crop_image').click(function (event) {
            $image_crop
                .croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                })
                .then(function (response) {
                    $('.js-avatar').val(response);
                    //console.log(response)
                    $('#uploadimageModal').modal('hide');
                    $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail mb-3" style="width:200px; height:220px"/>');
                })
        });

        // Image Upload

    </script>
@endsection