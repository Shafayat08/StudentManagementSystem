
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{ asset('/')}}logo.jpeg" sizes="32x32" />
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/')}}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>


    <!-- Custom styles for this template-->
    <link href="{{ asset('/')}}admin/css/sb-admin-2.min.css" rel="stylesheet"/>
    <link href="{{ asset('/')}}admin/css/atlantis.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.1/rg-1.3.0/datatables.min.css" rel="stylesheet"/>   
    <link href="{{ asset('/') }}admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>   

    
    {{--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">  --}}
    <link href="{{ asset('/') }}admin/vendor/summernote/summernote-bs4.css" rel="stylesheet"/>
    <link href="{{ asset('/')}}admin/css/custom.css" rel="stylesheet"/>
    @yield('styles')
</head>