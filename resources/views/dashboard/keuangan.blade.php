@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="container py-5 bg-mabiro rounded-3">
                <div class="mb-dashboard-tittle-01 text-white mt-2">Selamat Datang, Di <strong>Dashboard Keuangan
                        Mabiro</strong></div>
                <div class="mb-dashboard-tittle-02 text-white mb-6">Sistem Informasi Manajemen Asrama</div>

                <!-- ROW 1 -->
                <div class="row g-6 mb-6">

                    <div class="col-md-6">
                        <div class="mb-card-dashboard">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">Rp. {{ number_format($saldo, 0, ',', '.') }}</p>
                                    <p class="card-subtitle">Sisa Saldo Kas Asrama</p>
                                </div>
                                <div class="icon-rounded">
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </div>
                            <a href="{{ route('biro.laporan') }}" class="card-footer-link">Lihat Rekapitulasi Keuangan
                                <i class="mb-icon-more fas fa-chevron-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-card-dashboard">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $tagihan }}</p>
                                    <p class="card-subtitle">Belum Membayar Tagihan</p>
                                </div>
                                <div class="icon-rounded"><i class="fas fa-file-invoice me-2"></i></div>
                            </div>
                            <a href="{{ route('biro.rekap-pembayaran') }}" class="card-footer-link">Lihat
                                Detail Pelunasan Tagihan <i class="mb-icon-more fas fa-chevron-right"></i></a>
                        </div>
                    </div>


                </div>

                <!-- ROW 2 -->
                <div class="row g-6">
                    <!-- Kolom Kiri -->
                    <div class="col-md-8">
                        <div class="row g-6 mb-6">
                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $pemasukan_bulan }}</p>
                                            <p class="card-subtitle">Pemasukan Bulan Ini</p>
                                        </div>
                                        <div class="icon-rounded">
                                            <i class="fas fa-arrow-down me-2"></i>
                                        </div>
                                    </div>
                                    <a href="{{ route('keuangan.pemasukan') }}" class="card-footer-link">Lihat Pencatatan
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $pengeluaran_bulan }}</p>
                                            <p class="card-subtitle">Pengeluaran Bulan Ini</p>
                                        </div>
                                        <div class="icon-rounded">
                                            <i class="fas fa-arrow-up me-2"></i>
                                        </div>
                                    </div>
                                    <a href="{{ route('keuangan.pengeluaran') }}" class="card-footer-link">Lihat Pencatatan
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-6">
                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $keluhan }}</p>
                                            <p class="card-subtitle">Laporan Warga</p>
                                        </div>
                                        <div class="icon-rounded"><i class="fas fa-exclamation-circle"></i></div>
                                    </div>
                                    <a href="{{ route('biro.keluhan') }}" class="card-footer-link">Lihat Laporan Warga
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-card-dashboard">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $penghuni }}</p>
                                            <p class="card-subtitle">Penghuni</p>
                                        </div>
                                        <div class="icon-rounded">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    {{-- <a href="{{ route('biro.data-penghuni') }}" class="card-footer-link">Lihat Data Warga
                                        <i class="mb-icon-more fas fa-chevron-right"></i></a> --}}
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
                            {{-- <a href="{{ route('biro.jadwal-agenda') }}" class="card-footer-link">Kelola Jadwal & Agenda
                                <i class="mb-icon-more fas fa-chevron-right"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
