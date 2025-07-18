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

    <div class="blog-area grid-colum default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content">
                    <div class="blog-item-box">
                        <div class="row">
                            <!-- Single Item -->
                            @forelse ($data as $item)
                                <div class="col-lg-6 col-md-12 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="500ms"
                                        style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                                        <div class="info pt-4">
                                            <h6 class="fw-normal">{{ $item->keterangan }}</h6>
                                            <a class="btn btn-danger" target="_blank"
                                                href="{{ asset('/public/arsip/' . $item->nama_file) }}">Download File <i
                                                    class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-info col-md-12">Belum ada data.</div>
                            @endforelse
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
