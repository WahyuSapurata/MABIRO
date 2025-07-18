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
    <div class="team-area default-padding relative">
        <div class="container"> <!-- Atau container-fluid -->
            <div class="team-items text-center">
                <div class="owl-carousel team-carousel owl-theme">
                    <!-- Item 1 -->
                    @forelse ($pengelola as $pl)
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('/public/pengguna/' . $pl->foto) }}" alt="Thumb">
                            </div>
                            <div class="info-box">
                                <div class="info">
                                    <h5>{{ $pl->nama }}</h5>
                                    @php
                                        $role = $pl->role;
                                        $roleText = '';

                                        if ($role === 'biro') {
                                            $roleText = 'Kepala Biro Asrama';
                                        } elseif ($role === 'keuangan') {
                                            $roleText = 'Unit Keuangan';
                                        } elseif ($role === 'inventaris') {
                                            $roleText = 'Unit Inventaris';
                                        }
                                    @endphp
                                    <span>{{ $roleText }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets-landing/img/team/photo-grey.png') }}" alt="Thumb">
                            </div>
                            <div class="info-box">
                                <div class="info">
                                    <h5>Tidak ada data pengelola</h5>
                                    <span>Silakan hubungi admin untuk informasi lebih lanjut.</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->
@endsection
