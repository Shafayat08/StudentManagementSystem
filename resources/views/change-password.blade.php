@extends('admin.layouts.master')

@section('title','Admin | Change Password')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Page Heading -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-key"></i>&nbsp;Update password</h5>
                    </div>
                    <form action="{{route('updatePassword')}}" method="post" role="form">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                   @csrf
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Current Password <span class="text-danger">*</span></label>
                                            <div class="">
                                                <input class="form-control" name="old_password" placeholder="Your Current Password" type="password">
                                                @if ($errors->has('old_password'))
                                                    <span class="text-danger small">{{ $errors->first('old_password') }}</span>
                                                @else
                                                    @if ($errors->first('oldPassMatch'))
                                                        <span class="text-danger small">
                                                              {{"Old password doesn't match with the existing password!"}}
                                                          </span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">New Password <span class="text-danger">*</span></label>
                                            <div class="">
                                                <input class="form-control" name="password" placeholder="New Password"
                                                       type="password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger small">
                                                          {{ $errors->first('password') }}
                                                      </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">New Password Again <span class="text-danger">*</span></label>
                                            <div class="">
                                                <input class="form-control" name="password_confirmation" placeholder="New Password Again" type="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12 col-xl-4 col-lg-4 col-md-3"></div>
                                <div class="col-12 col-xl-4 col-lg-4 col-md-6 text-center">
                                    <button type="submit"  class="btn btn-lg btn-block btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection