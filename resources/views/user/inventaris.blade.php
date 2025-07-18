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

    <div class="project-details-area default-padding">
        <div class="container">
            <div class="project-details-items">
                <div class="main-content">
                    <table class="table table-striped table-sm text-left">
                        <thead class="thead-light text-uppercase text-xs">
                            <tr>
                                <th>No</th>
                                <th>No. Inventaris</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Baik</th>
                                <th>Kurang Baik</th>
                                <th>Rusak</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_inventaris }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->baik }}</td>
                                    <td>{{ $item->kurang_baik }}</td>
                                    <td>{{ $item->rusak }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
