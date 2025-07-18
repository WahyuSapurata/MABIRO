@extends('user.layouts.layout')
@section('content')
    <!-- Start Breadcrumb
                                                                                                                                                                                                                                                                ============================================= -->
    <div class="breadcrumb-area text-center shadow theme-hard bg-fixed text-light"
        style="background-image: url({{ asset('assets-landing/img/banner/asrama.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $module }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="contact-area bg-gray default-padding">
        <div class="container">
            <div class="contact-box">
                <div class="row align-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="info">
                                <h5>Office Location</h5>
                                <p>
                                    22 Baker Street, London, <br>United Kingdom, W1U 3BW
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info">
                                <h5>Phone</h5>
                                <p>
                                    +44-20-7328-4499 <br>+99-34-8878-9989
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope-open"></i>
                            </div>
                            <div class="info">
                                <h5>Email</h5>
                                <p>
                                    info@yourdomain.com <br>admin@yourdomain.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="maps-area">
        <div class="google-maps">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7414318794936!2d119.4889475!3d-5.1452681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee349b8ef7aff%3A0x541e15d3e939c806!2sKPMB%20Makassar!5e0!3m2!1sid!2sid!4v1752849420995!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@endsection
