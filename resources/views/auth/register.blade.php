<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8"/>
<link rel="icon" type="image/png" href="{{ asset('/')}}admin/favicon.ico" sizes="32x32"/>

<title>Aroggo | Login</title>
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
            background: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
            ),
            url('{{ asset('/')}}admin/img/loginbg1.jpg');
            background-size: cover;
        }
    </style>
</head>


<body>
<div class="login_area" style="height: 100vh">
    <div class="container h-100">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><a href="{{ url('/') }}" class=""><i
                                                        class="fa fa-home"></i></a> Create an Account!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 ">
                                                <input
                                                        id="name"
                                                        type="text"
                                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                                        placeholder="Your name"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus
                                                />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12">
                                                <input
                                                        type="email"
                                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                                        id="email"
                                                        placeholder="Your email"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email"
                                                />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3">
                                                <input
                                                        id="password"
                                                        type="password"
                                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                                        placeholder="Password"
                                                        name="password" required autocomplete="new-password"
                                                />
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12">
                                                <input
                                                        type="password"
                                                        class="form-control form-control-user"
                                                        id="password-confirm"
                                                        placeholder="Repeat Password"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password"
                                                />
                                            </div>
                                        </div>
                                        <button
                                                type="submit"
                                                class="btn btn-primary btn-user btn-block"
                                        >
                                            Register Now
                                        </button>

                                    </form>
                                    <hr/>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}"
                                        >Forgot Password?</a
                                        >
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}"
                                        >Already have an account? Login!</a
                                        >
                                    </div>
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







