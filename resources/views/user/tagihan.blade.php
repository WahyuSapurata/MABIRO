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
                        <h5>Semua Tagihan</h5>
                        <h2 class="area-title">Tagihan Anda Yang Belum di Bayarkan Tiap Bulannya</h2>
                        <div class="devider"></div>
                    </div>
                    <div class="row">
                        @forelse ($data as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-mabiro">
                                        <h5 class="mb-0 text-white">Tagihan Anda Di Bulan
                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('F') }}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <h6>Total Tagihan: Rp {{ number_format($item->total_tagihan, 0, ',', '.') }}</h6>
                                        @if ($item->status == 'proses')
                                            <button class="btn btn-primary">Pembayaran di Proses</button>
                                        @else
                                            <button class="btn btn-danger btn-buka-modal"
                                                data-uuid="{{ $item->uuid }}">Selesaikan
                                                Pembayaran</button>
                                        @endif

                                        @if ($item->status == 'tolak')
                                            <div class="d-grid mt-2">
                                                <h6 class="text-warning mb-0">Ada kesalahan dalam transaksi anda, harap
                                                    lakukan
                                                    pembayaran ulang.</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    Tagihan anda telah lunas semua
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="main-content">
                    <div class="site-heading text-center">
                        <h5>Riwayat</h5>
                        <h2 class="area-title">Semua Riwayat Tagihan Anda Selama Ini</h2>
                        <div class="devider"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm text-left">
                                <thead class="thead-light text-uppercase text-xs">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Total Tagihan</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Satus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($riwayat as $rwt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($rwt->updated_at)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>Rp {{ number_format($rwt->total_tagihan, 0, ',', '.') }}</td>
                                            <td>{{ $rwt->metode_pembayaran }}</td>
                                            <td>
                                                <div
                                                    class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success p-2 py-1">
                                                    {{ $rwt->status }}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak tersedia</td>
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
    <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formPembayaran" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPembayaranLabel">Form Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content">
                        <div class="mb-10">
                            <label class="form-label">Metode Pemabayaran</label>
                            <select name="metode_pembayaran" class="form-control" required>
                                <option value="">-- Pilih Metode Pemabayaran --
                                </option>
                                <option value="Transfer">Transfer</option>
                                <option value="Tunai">Tunai</option>
                            </select>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Upload Bukti</label>
                            <input type="file" name="bukti" accept=".png, .jpg, .jpeg" class="form-control" required>
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
                $('#formPembayaran').attr('action', `/tagihan-add/${uuid}`);

                // Buka modal
                var modal = new bootstrap.Modal(document.getElementById('modalPembayaran'));
                modal.show();
            });

            // Submit form via AJAX
            $('#formPembayaran').on('submit', function(e) {
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
                            $('#modalPembayaran').modal('hide'); // Tutup modal
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
