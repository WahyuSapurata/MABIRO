@extends('user.layouts.layout')
@section('content')
    <!-- Start Breadcrumb -->
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
                        <div class="arsip-container container py-3">
                            <div class="row g-3">

                                @forelse ($data as $item)
                                    <div class="col-lg-4 col-md-12">
                                        <div class="arsip-card-horizontal">
                                            <div class="arsip-icon">
                                                <iconify-icon icon="mdi:file-document-outline" width="50" height="50"
                                                    style="width: auto;"></iconify-icon>
                                            </div>

                                            <div class="arsip-info">
                                                <h6 class="arsip-title mb-2">{{ $item->keterangan }}</h6>

                                                <a class="arsip-btn" target="_blank"
                                                    href="{{ asset('/public/arsip/' . $item->nama_file) }}">
                                                    <iconify-icon icon="mdi:download" width="18"
                                                        height="18"></iconify-icon>
                                                    Download File
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-info text-center col-12">
                                        <iconify-icon icon="mdi:information-outline" width="24"
                                            height="24"></iconify-icon>
                                        Belum ada arsip & dokumen yang ditambahkan
                                    </div>
                                @endforelse

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Container */
    .arsip-container {
        max-width: 1200px;
    }

    /* Card */
    .arsip-card-horizontal {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 14px;
        box-shadow: -1px 1px 19px 5px rgb(0 0 0 / 5%);
        padding: 1rem 1.2rem;
        transition: all 0.35s ease;
        gap: 1rem;
        opacity: 0;
        transform: translateY(15px);
        animation: fadeUp 0.7s ease forwards;
    }

    /* Animasi masuk (fade in dari bawah) */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Hover effect */
    .arsip-card-horizontal:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    /* Icon */
    .arsip-icon {
        flex-shrink: 0;
        background: #ffe4e4;
        border-radius: 12px;
        padding: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #d32f2f;
        animation: pulse 2s infinite ease-in-out;
        transition: all 0.3s ease;
    }

    /* Icon berdenyut */
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(211, 47, 47, 0.4);
        }

        50% {
            transform: scale(1.1);
            box-shadow: 0 0 0 8px rgba(211, 47, 47, 0);
        }

        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(211, 47, 47, 0);
        }
    }

    /* Saat card di-hover, icon ikut membesar */
    .arsip-card-horizontal:hover .arsip-icon {
        transform: scale(1.15);
        background: #ffdede;
        color: #b71c1c;
    }

    /* Info */
    .arsip-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .arsip-title {
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.4;
        margin-bottom: 0.4rem;
    }

    /* Button */
    .arsip-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: linear-gradient(90deg, #b71c1c, #d32f2f);
        color: #fff;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 8px;
        padding: 6px 12px;
        text-decoration: none;
        transition: all 0.25s ease;
        width: fit-content;
    }

    .arsip-btn:hover {
        background: linear-gradient(90deg, #8b0000, #b71c1c);
        transform: translateY(-1px);
        color: #fff;
        box-shadow: 0 4px 10px rgba(139, 0, 0, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .arsip-card-horizontal {
            flex-direction: column;
            text-align: center;
            padding: 1rem;
        }

        .arsip-icon {
            margin-bottom: 0.6rem;
        }

        .arsip-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
