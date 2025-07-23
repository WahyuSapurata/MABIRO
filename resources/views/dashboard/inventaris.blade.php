@extends('layouts.layout')
@section('content')
    <style>
        .card-custom {
            border-radius: 30px;
            background: white;
            padding: 1.5rem;
            color: #333;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .icon-rounded {
            background-color: #730022;
            padding: 0.7rem;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
        }

        .card-title-big {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .card-subtitle {
            color: #6c757d;
            font-size: 1rem;
        }

        .card-footer-link {
            background: linear-gradient(to right, #fff, #d5b5bc);
            color: #555;
            border-radius: 20px;
            padding: 8px 14px;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.2rem;
        }

        .card-footer-link i {
            color: white;
            background: #730022;
            padding: 6px;
            border-radius: 50%;
            font-size: 0.8rem;
        }

        .agenda-card {
            border-radius: 30px;
            background: white;
            padding: 1.5rem;
            color: #333;
        }

        .agenda-card h5 {
            font-weight: bold;
        }

        .agenda-card table th {
            background-color: #730022;
            color: white;
            vertical-align: middle;
        }

        .agenda-link {
            background: linear-gradient(to right, #fff, #d5b5bc);
            color: #555;
            border-radius: 20px;
            padding: 8px 14px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.2rem;
            width: 100%;
        }
    </style>
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
                                    <p class="card-title-big">{{ $peminjaman_belum_kembali }}</p>
                                    <p class="card-subtitle">Barang Belum Kembali</p>
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
                                    <p class="card-title-big">{{ $barang_rusak }}</p>
                                    <p class="card-subtitle">Barang Rusak</p>
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
                                    <p class="card-title-big">{{ $barang_kurang_baik }}</p>
                                    <p class="card-subtitle">Barang Kurang Baik</p>
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
                                    <p class="card-title-big">{{ $total_inventaris }}</p>
                                    <p class="card-subtitle">Total Inventaris</p>
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
                        <div class="agenda-card h-100 d-flex flex-column justify-content-between">
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
