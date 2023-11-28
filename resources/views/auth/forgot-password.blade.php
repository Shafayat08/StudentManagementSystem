<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8"/>
<link rel="icon" type="image/png" href="{{ asset('/')}}admin/favicon.ico" sizes="32x32"/>

<title>MirrorMirror | Forget Password</title>
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
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr/>

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
</body>
</html>
