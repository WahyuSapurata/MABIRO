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
                <div class="card bg-white">
                    <div class="card-body p-0">
                        <div class="table-responsive text-black">
                            <table class="table table-striped table-bordered text-black">
                                <tbody>
                                    <tr>
                                        <td>Foto</td>
                                        <td><img src="/public/penghuni/{{ $data->foto ?? 'default.jpg' }}" alt="Foto"
                                                style="width: 100px;"></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>{{ $data->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Warga</td>
                                        <td>{{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>{{ $data->password_hash }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>{{ $data->data_penghuni->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>{{ $data->data_penghuni->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>{{ $data->data_penghuni->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>{{ $data->data_penghuni->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $data->data_penghuni->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kampus</td>
                                        <td>{{ $data->data_penghuni->universitas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td>{{ $data->data_penghuni->program_studi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Riwayat Pendidikan</td>
                                        <td>{{ $data->data_penghuni->riwayat_pendidikan }}</td>
                                    </tr>
                                    <tr>
                                        <td>No HP</td>
                                        <td>{{ $data->data_penghuni->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alasan</td>
                                        <td>{{ $data->data_penghuni->alasan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kamar</td>
                                        <td>{{ $data->data_penghuni->kamar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $data->data_penghuni->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
