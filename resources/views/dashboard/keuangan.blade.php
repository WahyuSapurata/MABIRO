@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="container py-5 bg-mabiro rounded-3">
                <h4 class="text-white mb-4">Selamat Datang, di <strong>Dashboard Admin Mabiro</strong></h4>
                <h2 class="text-white mb-4">Sistem Informasi Manajemen Asrama</h2>

                <!-- ROW 1 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <div class="card-custom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $penghuni }}</p>
                                    <p class="card-subtitle">Penghuni</p>
                                </div>
                                <div class="icon-rounded">
                                    ðŸ“˜
                                </div>
                            </div>
                            <a href="{{ route('biro.data-penghuni') }}" class="card-footer-link">Lihat Data Warga
                                <i>&#8250;</i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-custom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $pemasukan_bulan }}</p>
                                    <p class="card-subtitle">Pemasukan Per Bulan</p>
                                </div>
                                <div class="icon-rounded">
                                    ðŸ“˜
                                </div>
                            </div>
                            <a href="{{ route('keuangan.pemasukan') }}" class="card-footer-link">Lihat Data Warga
                                <i>&#8250;</i></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-custom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">{{ $pengeluaran_bulan }}</p>
                                    <p class="card-subtitle">Pengeluaran Per Bulan</p>
                                </div>
                                <div class="icon-rounded">
                                    ðŸ“˜
                                </div>
                            </div>
                            <a href="{{ route('keuangan.pengeluaran') }}" class="card-footer-link">Lihat Data Warga
                                <i>&#8250;</i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-custom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="card-title-big">Rp. {{ number_format($saldo, 0, ',', '.') }}</p>
                                    <p class="card-subtitle">Sisa Saldo Kas Asrama</p>
                                </div>
                                <div class="icon-rounded">
                                    ðŸ’°
                                </div>
                            </div>
                            <a href="{{ route('biro.laporan') }}" class="card-footer-link">Lihat Rekapitulasi
                                <i>&#8250;</i></a>
                        </div>
                    </div>
                </div>

                <!-- ROW 2 -->
                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <div class="card-custom">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $tagihan }}</p>
                                            <p class="card-subtitle">Tagihan</p>
                                        </div>
                                        <div class="icon-rounded">ðŸ‘¥</div>
                                    </div>
                                    <a href="{{ route('biro.rekap-pembayaran') }}" class="card-footer-link">Lihat
                                        Selengkapnya <i>&#8250;</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="card-custom">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="card-title-big">{{ $keluhan }}</p>
                                            <p class="card-subtitle">Laporan Warga</p>
                                        </div>
                                        <div class="icon-rounded">ðŸ“‘</div>
                                    </div>
                                    <a href="{{ route('biro.keluhan') }}" class="card-footer-link">Lihat Daftar Warga
                                        <i>&#8250;</i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan - Jadwal -->
                    <div class="col-md-6">
                        <div class="card-custom h-100 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="mb-3 text-center">Jadwal & Agenda</h5>
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
                            <a href="{{ route('biro.jadwal-agenda') }}" class="agenda-link">Kelola Jadwal & Agenda
                                <i>&#8250;</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
