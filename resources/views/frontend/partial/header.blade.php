
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><img src="{{ asset('/') }}/logo.png" style="width:50px;height:50px;border-radius: 5px " alt="">&nbsp;<a href="{{ route('home') }}" class="" style="font-weight: 900">নিরাময়</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>

                @guest
                <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                @endguest
                @auth
                    <li><a class="getstarted scrollto" href="{{ route('dashboard') }}">Dashboard</a></li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->