@extends('user.layouts.layout')
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <!-- Start Breadcrumb -->
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
                <div class="top-info">
                    <div class="site-heading text-center">
                        <h5>Absensi</h5>
                        <h2 class="area-title">Lakukan Absesnsi Piket Anda</h2>
                        <div class="devider"></div>
                    </div>
                    <div class="row">
                        @if ($data)
                            @if ($data->dokumentasi_foto)
                                <div class="col-12">
                                    <div class="alert alert-info" role="alert">
                                        Anda sudah melakukan absensi
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Jadwal Piket Anda
                                                {{ \Carbon\Carbon::parse($data->waktu)->translatedFormat('d-m-Y H:i') }}
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <button class="btn btn-danger btn-buka-modal"
                                                data-uuid="{{ $data->uuid }}">Lakukan
                                                Absensi</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    Tidak ada jadwal piket hari ini
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="main-content">
                    <div class="site-heading text-center">
                        <h5>Riwayat</h5>
                        <h2 class="area-title">Semua Riwayat Absensi Piket Anda</h2>
                        <div class="devider"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm text-left">
                                <thead class="thead-light text-uppercase text-xs">
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Dokumentasi Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($riwayat as $rwt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rwt->lokasi }}</td>
                                            <td>{{ $rwt->tanggal }}</td>
                                            <td>{{ $rwt->waktu }}</td>
                                            <td><img width="150px"
                                                    src="{{ asset('/public/absen/' . $rwt->dokumentasi_foto) }}"
                                                    alt=""></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tunggal -->
    <div class="modal fade" id="modalAbsensi" tabindex="-1" aria-labelledby="modalAbsensiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAbsensi" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAbsensiLabel">Form Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content">
                        <div class="mb-10">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Jam</label>
                            <input type="time" name="waktu" class="form-control" required>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Upload Absensi</label>
                            <input type="file" name="dokumentasi_foto" accept=".png, .jpg, .jpeg" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Saat tombol diklik
            $(document).on('click', '.btn-buka-modal', function() {
                const uuid = $(this).data('uuid');

                // Set action form-nya sesuai UUID
                $('#formAbsensi').attr('action', `/upload-absen/${uuid}`);

                // Buka modal
                var modal = new bootstrap.Modal(document.getElementById('modalAbsensi'));
                modal.show();
            });

            // Submit form via AJAX
            $('#formAbsensi').on('submit', function(e) {
                e.preventDefault();

                let form = this;
                let formData = new FormData(form);
                let actionUrl = $(form).attr('action');

                if (!actionUrl) {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: "URL aksi tidak ditemukan.",
                    });
                    return;
                }

                $.ajax({
                    url: actionUrl,
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        Swal.fire({
                            title: "Sedang diproses...",
                            html: "Mohon tunggu sebentar.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        });
                    },
                    success: function(response) {
                        Swal.fire({
                            text: response.message || "Berhasil menyimpan data",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            $('#modalAbsensi').modal('hide'); // Tutup modal
                            window.location.reload(); // Refresh halaman
                        });
                    },
                    error: function(xhr) {
                        let errMsg = "Terjadi kesalahan";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errMsg = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: errMsg,
                        });

                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
