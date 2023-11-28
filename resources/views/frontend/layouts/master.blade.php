<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aroggo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/') }}/favicon.ico" rel="icon">
    <link href="{{ asset('/') }}/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/frontend') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('/frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/frontend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/frontend') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('/frontend') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/frontend') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('/frontend') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/frontend') }}/css/style.css" rel="stylesheet">

</head>

<body>

@include('frontend.partial.header')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Better Solutions</h1>
                <h2>Obstetric Care Professionals </h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn-get-started scrollto">Prosuti Kollan</a>
                    {{--<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>--}}
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('/frontend') }}/img/b.jpg" class="img-fluid rounded" alt="" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12)">
            </div>
        </div>
    </div>


</section><!-- End Hero -->



<main id="main">


   @yield('content')


</main><!-- End #main -->

@include('frontend.partial.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('/frontend') }}/vendor/aos/aos.js"></script>
<script src="{{ asset('/frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/frontend') }}/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('/frontend') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('/frontend') }}/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('/frontend') }}/vendor/waypoints/noframework.waypoints.js"></script>
<script src="{{ asset('/frontend') }}/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('/frontend') }}/js/main.js"></script>

</body>

</html>