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
    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <div class="container">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-4" style="position: relative; height: 573px;">

                        <!-- Single Item -->
                        @forelse ($data as $item)
                            <div class="pf-item" style="position: absolute; left: 0%; top: 0px;">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('/public/fasilitas/' . $item->gambar) }}" alt="Thumb">
                                        <a href="{{ asset('/public/fasilitas/' . $item->gambar) }}"
                                            class="item popup-gallery"><i class="fa fa-plus"></i></a>
                                    </div>
                                    <div class="info">
                                        <div class="tags">
                                            <a href="#">{{ $item->deskripsi }}</a>
                                        </div>
                                        <h4>
                                            <a href="#">{{ $item->nama_fasilitas }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    Tidak ada data
                                </div>
                            </div>
                        @endforelse
                        <!-- End Single Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->
@endsection
