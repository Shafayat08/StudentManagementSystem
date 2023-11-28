@extends('frontend.layouts.master')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="{{ asset('/frontend') }}/img/p2.jpg" class="img-fluid  rounded " alt="">
                            {{--  <i class="fa fa-child fa-2x" aria-hidden="true"></i>  --}}
                        </div>
                        <h4><a href="">Sishu kollan</a></h4>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="{{ asset('/frontend') }}/img/p3.jpg" class="img-fluid  rounded " alt="">
                        </div>
                        <h4><a href="">Rogi kollan</a></h4>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="{{ asset('/frontend') }}/img/p4.jpg" class="img-fluid  rounded " alt="">
                        </div>
                        <h4><a href="">Manosik Sastho</a></h4>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="{{ asset('/frontend') }}/img/p5.jpg" class="img-fluid  rounded " alt="">
                        </div>
                        <h4><a href="">Sape Katha</a></h4>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
@endsection