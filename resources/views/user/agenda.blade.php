@extends('user.layouts.layout')
@php
    use Carbon\Carbon;
@endphp
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
    <div class="blog-area grid-colum default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content">
                    <div class="blog-item-box">
                        <div class="row">
                            <!-- Single Item -->
                            @forelse ($data as $item)
                                <div class="col-lg-4 col-md-6 single-item">
                                    <div class="item wow fadeInUp" data-wow-delay="500ms"
                                        style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                                        <div class="thumb bg-mabiro">
                                            <a href="">
                                                <img src="{{ asset('/public/program/' . $item->icon) }}" class="filter-svg"
                                                    alt="Thumb">
                                            </a>
                                            <div class="date">
                                                {{ Carbon::parse($item->jadwal_pelaksanaan)->translatedFormat('d') }}
                                                <span>{{ \Illuminate\Support\Str::limit(Carbon::parse($item->jadwal_pelaksanaan)->translatedFormat('F'), 3, '') }},
                                                    {{ Carbon::parse($item->jadwal_pelaksanaan)->translatedFormat('Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="">{{ $item->nama_program }}</a>
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

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                @if ($data->lastPage() > 1)
                                    <nav aria-label="navigation">
                                        <ul class="pagination justify-content-center">

                                            {{-- Tombol First Page --}}
                                            <li class="page-item {{ $data->onFirstPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $data->url(1) }}">
                                                    <i class="fas fa-angle-double-left"></i>
                                                </a>
                                            </li>

                                            {{-- Nomor Halaman --}}
                                            @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                <li class="page-item {{ $i == $data->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $data->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            {{-- Tombol Last Page --}}
                                            <li class="page-item {{ !$data->hasMorePages() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $data->url($data->lastPage()) }}">
                                                    <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </nav>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->
@endsection
