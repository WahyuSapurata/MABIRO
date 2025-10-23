@extends('user.layouts.layout')
@section('content')
    <!-- Start Breadcrumb
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ============================================= -->
    <div class="breadcrumb-area text-center shadow theme-hard bg-fixed text-light"
        style="background-image: url({{ asset('assets-landing/img/banner/asrama.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $module }} Warga</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="project-details-area default-padding">
        <div class="container">
            <div class="project-details-items">
                <div>

                    <div>
                        <div class="card shadow-lg border-0 rounded-4 overflow-hidden"
                            style="border-radius: 16px;    background: none;">
                            <div class="row g-0 px-4 py-4">
                                <!-- Bagian Foto -->
                                <div class="col-md-3 bg-light d-flex flex-column align-items-center justify-content-center p-4"
                                    style="background: none !important;">
                                    <img src="public/penghuni/{{ $data->foto ?? 'default.jpg' }}" alt="Foto Profil"
                                        class="border border-3 shadow-sm mb-3"
                                        style="width: 180px; height: 200px; object-fit: cover; border-radius: 20px; object-position: top;">
                                    <h4 class="mb-2 text-center">{{ $data->nama }}</h4>
                                    <span class="badge mb-btn-tambah-data px-3 py-2">
                                        <i class="bi bi-door-closed"></i> Kamar
                                        {{ $data->data_penghuni?->kamar ?? '-' }}
                                    </span>
                                </div>

                                <!-- Bagian Detail -->
                                <div class="col-md-9 p-4">
                                    <h5 class="fw-bold mb-3 mt-3">Detail Profil</h5>
                                    <div class="row">
                                        <div class="col-sm-4 mb-3">

                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Tempat, Tanggal Lahir</small>
                                                <div>{{ $data->data_penghuni?->tempat_lahir ?? '-' }},
                                                    {{ $data->data_penghuni?->tanggal_lahir ?? '-' }}</div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Alamat</small>
                                                <div>{{ $data->data_penghuni?->alamat ?? '-' }}</div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Agama</small>
                                                <div>{{ $data->data_penghuni?->agama ?? '-' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Kampus</small>
                                                <div>{{ $data->data_penghuni?->universitas ?? '-' }}</div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Program Studi</small>
                                                <div>{{ $data->data_penghuni?->program_studi ?? '-' }}</div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Pendidikan SMA / Sederajat</small>
                                                <div>{{ $data->data_penghuni?->riwayat_pendidikan_sma ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Username</small>
                                                <div> {{ $data->username }}</div>
                                            </div>

                                            <div class="col-sm-12 mb-3">
                                                <small class="text-muted">Password Akun</small>
                                                <div class="text-truncate">{{ $data->password_hash }}</div>
                                            </div>
                                            <div class="col-sm-12 mb-3">

                                                @if (auth()->check())
                                                    <button type="button" class="btn btn-danger"><a
                                                            href="{{ route('logout') }}"
                                                            class="text-white text-decoration-none">
                                                            Keluar <i class="fas fa-sign-out-alt"></i></a></button>
                                                @else
                                                    <button type="button" class="btn btn-login"><a
                                                            href="{{ route('login.login-akun') }}"
                                                            class="text-white text-decoration-none"> <i
                                                                class="fas fa-sign-in-alt"></i>
                                                            Masuk</a></button>
                                                @endif

                                            </div>
                                        </div>

                                    </div>


                                </div>



                            </div>


                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
@endsection
