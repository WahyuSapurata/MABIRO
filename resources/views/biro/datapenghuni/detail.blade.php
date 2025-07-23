@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <button class="btn btn-info btn-sm" id="button-side-form">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" id="svg-button"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <style>
                        #svg-button {
                            fill: #ffffff
                        }
                    </style>
                    <path
                        d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z" />
                </svg>
                Kembali</button>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card bg-white">
                    <div class="card-body p-0">
                        <div class="py-3 table-responsive text-black">
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
                                        <td>{{ $data->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>{{ $data->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $data->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kampus</td>
                                        <td>{{ $data->universitas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td>{{ $data->program_studi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Riwayat Pendidikan SD</td>
                                        <td>{{ $data->riwayat_pendidikan_sd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Riwayat Pendidikan SMP</td>
                                        <td>{{ $data->riwayat_pendidikan_smp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Riwayat Pendidikan SMA</td>
                                        <td>{{ $data->riwayat_pendidikan_sma }}</td>
                                    </tr>
                                    <tr>
                                        <td>No HP</td>
                                        <td>{{ $data->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alasan</td>
                                        <td>{{ $data->alasan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kamar</td>
                                        <td>{{ $data->kamar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $data->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        $(document).on('click', '#button-side-form', function() {
            window.history.back();
        })
    </script>
@endsection
