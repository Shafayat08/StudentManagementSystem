<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="{{ asset('/')}}logo.png" sizes="32x32" />

<title> School | Login </title>
<head>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/')}}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet"/>


    <!-- Custom styles for this template-->
    <link href="{{ asset('/')}}admin/css/sb-admin-2.min.css" rel="stylesheet"/>
    <link href="{{ asset('/')}}admin/css/atlantis.css" rel="stylesheet"/>
    <link href="{{ asset('/') }}admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link href="{{ asset('/')}}admin/css/custom.css" rel="stylesheet"/>
    <style>
        .login_area {
            background:
                    linear-gradient(
                            rgba(0, 0, 0, 0.5),
                            rgba(0, 0, 0, 0.5)
                    ),
                    url('{{ asset('/')}}admin/img/loginbg1.jpg');
            background-size:cover;
        }
    </style>
</head>


<body>
<div class="login_area" style="height: 100vh" >
    <div class="container h-100">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center h-100">

            <div class="col-xl-8 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                        <img src="{{ asset('/') }}logo.png" class="mb-4" style="width:150px; height:150px;" alt="">
                                        <h1 class="h4 text-gray-900 mb-3"> Login To School </h1>
                                        {{--  <p>
                                            <img src="{{ asset('/') }}admin/img/glogo.png" class="mb-2" style="width:30px; height:30px;" alt=""> Tour Management System
                                        </p>  --}}
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus
                                                   placeholder="Enter Email Address...">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   id="password" name="password" required autocomplete="current-password"
                                                   placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember"
                                                       id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember me</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    {{--  <hr>
                                    @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>
                                    @endif  --}}
                                    {{--  <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>



</body>

</html>












