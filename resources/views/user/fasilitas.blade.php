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

    <!-- Star About Area -->
    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <div class="container">
            <div class="row g-4 justify-content-center">

                @forelse ($data as $item)
                    <div class="col-12 col-lg-4 col-md-3">
                        <div class="card border-0 shadow-sm h-100"
                            style="border-radius: 20px; overflow: hidden; padding: 10px; box-shadow: 0 .125rem 8px 4px rgba(0, 0, 0, 0.042) !important;">
                            <div class="position-relative">
                                <img src="{{ asset('/public/fasilitas/' . $item->gambar) }}" alt="Thumb"
                                    class="img-fluid w-100" style="height: 200px; object-fit: cover; border-radius: 10px;">

                                <a href="{{ asset('/public/fasilitas/' . $item->gambar) }}"
                                    class="popup-gallery d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100"
                                    style="background-color: rgba(0,0,0,0.4); opacity: 0; transition: 0.3s; border-radius: 10px;">
                                    <i class="fa fa-eye text-white fs-4"></i>
                                </a>
                            </div>

                            <div class="card-body text-center">

                                <h5 class="fw-semibold mb-0" style="color: #333;">{{ $item->nama_fasilitas }}</h5>
                                <div class="tags mt-2">
                                    <span class="badge bg-light text-muted"
                                        style="font-size: 0.85rem; font-weight: 300;">{{ $item->deskripsi }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            Tidak ada data
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
    <!-- End About Area -->
@endsection
<style>
    .card .popup-gallery:hover {
        opacity: 1 !important;
    }
</style>
