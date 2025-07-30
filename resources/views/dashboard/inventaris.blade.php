@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container">
            <div class="container py-5 bg-mabiro rounded-3">
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start text-center text-md-start">
                    <!-- Kiri: Judul -->
                    <div>
                        <div class="mb-dashboard-tittle-01 text-white mt-2 text-center text-md-start">Selamat Datang di,
                            <span><strong>Dashboard Unit Inventaris</strong></span>
                        </div>
                        <div class="mb-dashboard-tittle-02 text-white mt-0 text-center text-md-start text-white mb-3">
                            Sistem
                            Informasi Manajemen Asrama</div>
                    </div>
                    <!-- Kanan: Hari, Tanggal, Jam -->
                    <div
                        class="d-flex flex-row flex-md-column justify-content-center align-items-center align-items-md-end text-white text-center text-md-end mt-0 mb-5 mb-md-0 mb-dash-time mb-dashboard-tittle-02 gap-2 gap-md-0">
                        <div id="hariTanggal" class="fw-semibold"></div>
                        <div id="jamSekarang" class="fs-5 fw-bold"></div>
                    </div>
                </div>

                <!-- ROW 1 -->
                <div class="row g-6 mb-6">


                    <div class="col-md-4">
                        <div class="mb-card-dashboard">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $total_inventaris }}</p>
                                    <p class="card-subtitle">Total Inventaris</p>
                                </div>
                                <div class="icon-rounded">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <a href="/" class="card-footer-link">Lihat Data
                                Inventaris
                                <i class="mb-icon-more fas fa-chevron-right"></i></a>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="mb-card-dashboard">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $barang_rusak }}</p>
                                    <p class="card-subtitle">Kondisi Rusak</p>
                                </div>
                                <div class="icon-rounded">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <a href="/" class="card-footer-link">Lihat Data Selengkapnya
                                <i class="mb-icon-more fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-card-dashboard">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $barang_kurang_baik }} Inventaris</p>
                                    <p class="card-subtitle">Kondisi Kurang Baik</p>
                                </div>
                                <div class="icon-rounded">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <a href="/" class="card-footer-link">Lihat Data Selengkapnya
                                <i class="mb-icon-more fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- ROW 2 -->
                <div class="row g-6">
                    <!-- Kolom Kiri -->
                    <div class="col-md-8">

                        <div class="row g-6">

                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $peminjaman_belum_kembali }} Inventaris</p>
                                            <p class="card-subtitle">Sedang Dipinjamkan</p>
                                        </div>
                                        <div class="icon-rounded">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <a href="/" class="card-footer-link">Lihat Data Warga
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $tamu }} Tamu</p>
                                            <p class="card-subtitle">Sedang Berada Di Asrama</p>
                                        </div>
                                        <div class="icon-rounded"><i class="fas fa-user-check"></i></div>
                                    </div>
                                    <a href="{{ route('biro.data-tamu') }}" class="card-footer-link">Lihat Daftar Tamu
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $keluhan }}</p>
                                            <p class="card-subtitle">Laporan Warga</p>
                                        </div>
                                        <div class="icon-rounded"><i class="fas fa-users"></i></div>
                                    </div>
                                    <a href="{{ route('biro.keluhan') }}" class="card-footer-link">Lihat Daftar Warga
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $penghuni }} Orang</p>
                                            <p class="card-subtitle">Penghuni Saat Ini</p>
                                        </div>
                                        <div class="icon-rounded">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan - Jadwal -->
                    <div class="col-md-4">
                        <div class="mb-card-dashboard h-100 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="mb-6 text-center">Jadwal & Agenda</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Agenda</th>
                                            <th>Jadwal Pelaksanaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($agenda as $item)
                                            <tr>
                                                <td>{{ $item->nama_program }}</td>
                                                <td>{{ $item->jadwal_pelaksanaan }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center">Belum ada agenda</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('biro.jadwal-agenda') }}" class="card-footer-link">Kelola Jadwal & Agenda
                                <i class="mb-icon-more fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
