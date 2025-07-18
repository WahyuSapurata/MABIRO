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

    <!-- Star About Area
                                                                        ============================================= -->
    <div class="services-area default-padding">
        <div class="container">
            <div class="services-content text-center">
                <div class="row">
                    @forelse ($data as $item)
                        <!-- Single Item -->
                        <div class="single-item col-lg-4 col-md-6">
                            <div class="item">
                                <img src="{{ asset('/public/program/' . $item->icon) }}" alt="Thumb">
                                <h5><a href="#">{{ $item->nama_program }}</a></h5>
                                <p>
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                                Tidak ada data
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->
@endsection
