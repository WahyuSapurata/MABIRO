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
                <div>
                    {{-- <div class="site-heading text-center">
                        <h5>Absensi</h5>
                        <h2 class="area-title">Lakukan Absensi Piketmu</h2>
                        <div class="devider"></div>
                    </div> --}}
                    <div>
                        @if ($data)
                            @if ($data->status === 'Sudah Piket')
                                <div class="col-12">
                                    <div class="alert alert-info" role="alert">
                                        Kamu sudah melakukan absensi piket hari ini
                                    </div>
                                </div>
                            @else
                                <div>


                                    {{-- BARU --}}

                                    <div class="card"
                                        style="border: none; border-radius: 20px; box-shadow: 0px 1px 20px 0px rgb(0 0 0 / 12%); overflow: hidden; max-width: 500px; margin: 0 auto;">

                                        <!-- Header -->
                                        <div class="card-header text-center"
                                            style="background:linear-gradient(90deg,#710b28,rgb(199, 7, 0)); color: #fff!important; border: none; padding: 25px;">
                                            <h5 class="mb-0"
                                                style="font-weight:700; font-size:1.3rem; display:flex; align-items:center; justify-content:center; gap:10px; color:white;">
                                                <i class="fas fa-calendar-check"></i> Kamu Piket Hari Ini!
                                            </h5>
                                        </div>

                                        <!-- Body -->
                                        <div class="card-body text-center" style="padding: 35px;">
                                            <i class="bi bi-person-check-fill"
                                                style="font-size:3rem; color:#dc3545; margin-bottom:15px;"></i>
                                            <p style="font-size:1rem; color:#555; margin-bottom:25px; text-align: center;">
                                                Jangan lupa isi absensi piketmu hari ini untuk memastikan kehadiran
                                                tercatat.
                                            </p>
                                            <button class="btn btn-danger btn-buka-modal px-4 py-2"
                                                style="border-radius: 30px; font-weight: 600; box-shadow: 0 4px 10px rgba(220,53,69,0.4);"
                                                data-uuid="{{ $data->uuid }}">
                                                <i class="bi bi-pencil-square me-2"></i> Isi Absensi
                                            </button>
                                        </div>
                                    </div>

                                    {{-- END --}}

                                </div>
                            @endif
                        @else
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    Tidak ada jadwal piketmu hari ini
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- <div class="main-content">
                    <div class="site-heading text-center">
                        <h5>Riwayat</h5>
                        <h2 class="area-title">Semua Riwayat Absensi Piketmu</h2>
                        <div class="devider"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm text-left">
                                <thead class="thead-light text-uppercase text-xs">
                                    <tr class="mb-table-custom">
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Lokasi</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Dokumentasi Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($riwayat as $rwt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ !empty($rwt->tanggal) ? \Carbon\Carbon::createFromFormat('d-m-Y', $rwt->tanggal)->translatedFormat('d F Y') : '-' }}
                                            </td>
                                            <td>{{ $rwt->lokasi }}</td>


                                            <td>
                                                @if (!empty($rwt->waktu))
                                                    @php
                                                        $timeFormat =
                                                            str_contains($rwt->waktu, ':') &&
                                                            substr_count($rwt->waktu, ':') === 2
                                                                ? 'H:i:s'
                                                                : 'H:i';
                                                    @endphp
                                                    {{ \Carbon\Carbon::createFromFormat($timeFormat, $rwt->waktu)->format('H:i') }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                @if ($rwt->status === 'Sudah Piket')
                                                    <span
                                                        class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success p-2 py-1">
                                                        {{ $rwt->status }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger p-2 py-1">
                                                        {{ $rwt->status }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td>
                                                @if (!empty($rwt->dokumentasi_foto))
                                                    <img class="dokumentasi-foto-absensi"
                                                        src="{{ asset('/public/absen/' . $rwt->dokumentasi_foto) }}"
                                                        alt="Foto Absensi">
                                                @else
                                                    -
                                                @endif
                                            </td>
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
                </div> --}}

                {{-- AREA GRID PIKET BARU --}}
                <div class="container py-5">
                    {{-- <!-- Header -->
                    <div class="text-center mb-5">
                        <h5 class="text-primary fw-semibold">Riwayat</h5>
                        <h2 class="fw-bold">Semua Riwayat Absensi Piketmu</h2>
                        <div
                            style="width:70px; height:4px; background:linear-gradient(90deg,#007bff,#00c6ff); border-radius:10px; margin:15px auto;">
                        </div>
                    </div> --}}

                    <!-- Header -->
                    <div class="text-center mb-5">
                        <h5 class="fw-semibold mb-2"
                            style="color:rgb(199, 7, 0); letter-spacing:1px; text-transform:uppercase;">
                            Riwayat
                        </h5>
                        <h2 class="fw-bold mb-3" style="font-size:2rem; color:#1e1e1e;">
                            Semua Riwayat Absensi Piketmu
                        </h2>
                        <div
                            style="width:80px; height:5px;
                background:linear-gradient(90deg,#710b28,rgb(199, 7, 0));
                border-radius:50px;
                margin:0 auto;
                box-shadow:0 2px 8px #710b28;">
                        </div>
                    </div>

                    <!-- Grid -->
                    <div class="row g-4">
                        @forelse ($riwayat as $rwt)
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden"
                                    style="transition: all .3s ease; padding: 8px;border-radius: 20px;box-shadow: -1px -1rem 6rem 1px rgb(0 0 0 / 24%) !important;">

                                    <!-- Foto -->
                                    @if (!empty($rwt->dokumentasi_foto))
                                        <img src="{{ asset('/public/absen/' . $rwt->dokumentasi_foto) }}" alt="Foto Absensi"
                                            class="card-img-top"
                                            style="height:180px; object-fit:cover; border-radius: 12px;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light"
                                            style="height:180px; border-radius: 12px; background: #dddddd !important;">
                                            <span class="text-muted">Tidak ada foto</span>
                                        </div>
                                    @endif

                                    <!-- Konten -->
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <p class="text-muted small mb-1">
                                                {{ !empty($rwt->tanggal) ? \Carbon\Carbon::createFromFormat('d-m-Y', $rwt->tanggal)->translatedFormat('d F Y') : '-' }}
                                            </p>
                                            <h5 class="fw-bold mb-2">{{ $rwt->lokasi }}</h5>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <!-- Waktu -->
                                            <span class="text-muted fw-semibold small">
                                                <i class="far fa-clock"></i>
                                                @if (!empty($rwt->waktu))
                                                    @php
                                                        $timeFormat =
                                                            str_contains($rwt->waktu, ':') &&
                                                            substr_count($rwt->waktu, ':') === 2
                                                                ? 'H:i:s'
                                                                : 'H:i';
                                                    @endphp
                                                    {{ \Carbon\Carbon::createFromFormat($timeFormat, $rwt->waktu)->format('H:i') }}
                                                    WITA
                                                @else
                                                    -
                                                @endif
                                            </span>

                                            <!-- Status -->
                                            @if ($rwt->status === 'Sudah Piket')
                                                <span
                                                    class="badge bg-success px-3 py-2 rounded-pill shadow-sm">{{ $rwt->status }}</span>
                                            @elseif ($rwt->status === 'Absensi Kurang')
                                                <span class="badge bg-warning px-3 py-2 rounded-pill shadow-sm">
                                                    {{ $rwt->status }}
                                                </span>
                                            @else
                                                <span
                                                    class="badge bg-danger px-3 py-2 rounded-pill shadow-sm">{{ $rwt->status }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                <p class="mb-0">Data tidak tersedia</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- END AREA --}}

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
                        {{-- <div class="mb-10">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                        </div> --}}
                        <div class="mb-10">
                            <label class="form-label">Waktu Piket</label>
                            <input type="time" name="waktu" class="form-control" required>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Upload Dokumentasi</label>
                            <input type="file" name="dokumentasi_foto" accept=".png, .jpg, .jpeg" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-color btn-submit">Kirim</button>
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
