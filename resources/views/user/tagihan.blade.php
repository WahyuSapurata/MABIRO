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

    <div class="project-details-area default-padding" style="background:#fafafa;">
        <div class="container">
            <div class="project-details-items">

                <!-- ====== BAGIAN TAGIHAN AKTIF ====== -->
                <div class="mb-5">
                    <div class="row g-4 justify-content-center">
                        @forelse ($data as $item)
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card tagihan-card text-center"
                                    style="padding: 8px; box-shadow:0px 0rem 2rem 0px rgb(0 0 0 / 10%) !important; border:none; border-radius:22px; background:#fff; box-shadow:0 4px 25px rgba(0,0,0,0.08); transition:all .35s ease; overflow:hidden; ">

                                    <!-- Header -->
                                    <div class="card-header py-3"
                                        style="background:linear-gradient(90deg,#710b28,#c70700); border:none;">
                                        <h5 class="mb-0 text-white fw-bold" style="font-size:1.2rem; letter-spacing:0.5px;">
                                            <i class="fas fa-receipt me-2"></i>
                                            Tagihan Bulan
                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('F') }}
                                        </h5>
                                    </div>

                                    <!-- Body -->
                                    <div class="card-body py-4 px-3">
                                        <i class="bi bi-wallet2 mb-3" style="font-size:2.8rem; color:#c70700;"></i>
                                        <h6 class="fw-semibold text-dark mb-1">Total Tagihan</h6>
                                        <h4 class="fw-bold mb-3" style="color:#710b28;">
                                            Rp {{ number_format($item->total_tagihan, 0, ',', '.') }}
                                        </h4>

                                        @if ($item->status == 'proses')
                                            <button class="btn btn-secondary px-4 py-2"
                                                style="border-radius:30px; font-weight:600; box-shadow:0 3px 10px rgba(108,117,125,0.25); cursor:default;">
                                                <i class="bi bi-hourglass-split me-2"></i> Diproses
                                            </button>
                                        @elseif ($item->status == 'tolak')
                                            <div class="d-grid">
                                                <button class="btn btn-warning btn-buka-modal px-4 py-2"
                                                    data-uuid="{{ $item->uuid }}"
                                                    style="border-radius:30px; font-weight:600; box-shadow:0 4px 10px rgba(255,193,7,0.35);">
                                                    <i class="bi bi-arrow-repeat me-2"></i> Bayar Ulang
                                                </button>
                                                <small class="mt-2 text-warning fw-semibold">Transaksi gagal, ulangi
                                                    pembayaran.</small>
                                            </div>
                                        @else
                                            <button class="btn btn-danger btn-buka-modal px-4 py-2"
                                                data-uuid="{{ $item->uuid }}"
                                                style="border-radius:30px; font-weight:600; box-shadow:0 4px 12px rgba(220,53,69,0.4);">
                                                <i class="bi bi-credit-card me-2"></i> Selesaikan Pembayaran
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <div class="alert alert-success border-0 shadow-sm py-5 px-4 position-relative overflow-hidden"
                                    style="
            border-radius:20px;
            background: linear-gradient(135deg, #e6f9ec 0%, #d1f5df 100%);
            color: #155724;
        ">

                                    <div class="position-absolute top-0 start-0 w-100 h-100"
                                        style="background: radial-gradient(circle at top right, rgba(40,167,69,0.08), transparent 70%);">
                                    </div>

                                    <div class="position-relative">
                                        <div class="d-flex flex-column align-items-center justify-content-center">

                                            <!-- Emoticon Section -->
                                            <div class="d-flex align-items-center justify-content-center mb-3"
                                                style="
                        width:90px;
                        height:90px;
                        background:#fff;
                        border-radius:50%;
                        box-shadow:0 10px 25px rgba(0,0,0,0.08);
                        font-size:46px;
                        transition: transform 0.3s ease;
                    ">
                                                <span class="emoji-pulse">😎</span>
                                            </div>

                                            <!-- ✅ Text section -->
                                            <h4 class="fw-bold mb-2 text-success text-center">
                                                Semua tagihanmu telah kamu bayarkan <span class="emoji-wiggle">👍</span>
                                            </h4>
                                            <p class="text-success mb-0 text-center" style="font-size:0.95rem;">
                                                Terima kasih sudah melakukan pembayaran tepat waktu 💚
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- ====== BAGIAN RIWAYAT PEMBAYARAN ====== -->
                <div class="main-content mt-5 mb-5">

                    <!-- Header -->
                    <div class="text-center mb-5">
                        <h5 class="fw-semibold mb-2 text-uppercase" style="color:rgb(199, 7, 0); letter-spacing:1px;">
                            Riwayat
                        </h5>
                        <h2 class="fw-bold mb-3" style="font-size:2rem; color:#1e1e1e;">
                            Semua Riwayat Pembayaran Tagihanmu
                        </h2>
                        <div
                            style="width:80px; height:5px; background:linear-gradient(90deg,#710b28,rgb(199,7,0)); border-radius:50px; margin:0 auto; box-shadow:0 2px 8px #710b28;">
                        </div>
                    </div>

                    <div class="row g-4 justify-content-center">
                        @forelse ($riwayat as $rwt)
                            @php
                                $status = strtolower($rwt->status);
                                $icon = 'fas fa-file-invoice';
                                $iconColor = '#f0ad4e';
                                $iconBg = 'linear-gradient(90deg, #ffedb8, #ffe390)';
                                $badgeBg = 'linear-gradient(90deg,#ffc107,#ffcd39)';
                                $badgeColor = '#fff';
                                $badgeText = 'Belum Dikonfirmasi';
                                $badgeIcon = 'fa-hourglass-half';

                                if ($status == 'sudah lunas' || $status == 'lunas') {
                                    $icon = 'fas fa-file-invoice';
                                    $iconColor = '#28a745';
                                    $iconBg = 'linear-gradient(135deg,#e8f9f0,#d1f2e0)';
                                    $badgeBg = 'linear-gradient(90deg,#28a745,#218838)';
                                    $badgeColor = '#fff';
                                    $badgeText = 'Lunas';
                                    $badgeIcon = 'fa-check-circle';
                                } elseif (
                                    $status == 'belum' ||
                                    $status == 'belum dibayar' ||
                                    $status == 'belum lunas'
                                ) {
                                    $icon = 'fas fa-file-invoice';
                                    $iconColor = '#dc3545';
                                    $iconBg = 'linear-gradient(135deg,#fdeaea,#fbd4d4)';
                                    $badgeBg = 'linear-gradient(90deg,#dc3545,#b02a37)';
                                    $badgeColor = '#fff';
                                    $badgeText = 'Belum Bayar';
                                    $badgeIcon = 'fa-times-circle';
                                }
                            @endphp

                            <div class="col-12 col-md-6">
                                <div class="card border-0 shadow-sm riwayat-card position-relative overflow-hidden"
                                    style="border-radius:20px; transition:all .3s ease; background:#fff; box-shadow: 0px 0rem 3rem 1px rgb(0 0 0 / 24%) !important;padding: 8px;">

                                    <div class="d-flex flex-column flex-md-row align-items-stretch h-100">
                                        <!-- Left Icon Section -->
                                        <div class="p-4 d-flex flex-column align-items-center justify-content-center text-center; border-radius: 10px;"
                                            style="min-width:160px; background:{{ $iconBg }}; border-radius: 10px;">
                                            <div class="d-flex align-items-center justify-content-center"
                                                style="width:90px; height:90px; background:#fff; border-radius:50%; box-shadow:0 6px 12px rgba(0,0,0,0.08);">
                                                <i class="fas {{ $icon }}"
                                                    style="font-size:38px; color:{{ $iconColor }};"></i>
                                            </div>

                                        </div>

                                        <!-- Right Details Section -->
                                        <div class="flex-fill p-4 d-flex flex-column justify-content-center">
                                            <div class="d-flex flex-column flex-sm-row flex-wrap justify-content-between align-items-center text-center text-sm-start"
                                                style="
        border-bottom: 1px solid #ededed;
        padding-bottom: 20px;
        margin-bottom: 15px;
        row-gap: 10px;
    ">

                                                <h4 class="fw-bold text-dark mb-0">
                                                    {{ \Carbon\Carbon::parse($rwt->updated_at)->translatedFormat('F Y') }}
                                                </h4>

                                                <span class="badge px-3 py-2 rounded-pill shadow-sm mt-2 mt-sm-0"
                                                    style="
            background:{{ $badgeBg }};
            color:{{ $badgeColor }};
            font-weight:600;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:0.9rem;
        ">
                                                    <i class="fas {{ $badgeIcon }} me-1"></i> {{ ucfirst($badgeText) }}
                                                </span>
                                            </div>




                                            <div class="row g-3">
                                                <div class="col-12 col-sm-6">
                                                    <h6 class="fw-semibold text-dark mb-1">
                                                        <i class="fas fa-receipt text-success me-1"></i> Total Tagihan
                                                    </h6>
                                                    <p class="fw-bold text-success fs-5 mb-0">
                                                        Rp {{ number_format($rwt->total_tagihan, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <h6 class="fw-semibold text-dark mb-1">
                                                        <i class="fas fa-wallet text-info me-1"></i> Metode Pembayaran
                                                    </h6>
                                                    <p class="text-secondary mb-0">{{ $rwt->metode_pembayaran }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <div class="alert alert-light border-0 shadow-sm py-4" style="border-radius:18px;">
                                    <i class="fas fa-info-circle text-muted me-2"></i> Belum ada riwayat pembayaran.
                                </div>
                            </div>
                        @endforelse
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
                            <input type="file" name="bukti" accept=".png, .jpg, .jpeg" class="form-control"
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

<!-- ====== RESPONSIVE IMPROVEMENTS ====== -->
<style>
    .riwayat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    }

    .riwayat-card i {
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .riwayat-card:hover i {
        transform: scale(1.15);
    }

    @media (max-width: 767.98px) {
        .riwayat-card .d-flex.flex-md-row {
            flex-direction: column !important;
        }

        .riwayat-card .p-4.text-center {
            min-width: 100% !important;
        }
    }

    /* Hover Effect */
    .alert {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .alert:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(220, 53, 69, 0.15);
    }

    /* Emoji wiggle animation */
    .emoji-wiggle {
        display: inline-block;
        animation: wiggleThumb 1.5s ease-in-out infinite;
        transform-origin: 60% 70%;
    }

    @keyframes wiggleThumb {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(10deg);
        }

        50% {
            transform: rotate(-8deg);
        }

        75% {
            transform: rotate(6deg);
        }
    }

    /* Pulse animation for main emoji */
    .emoji-pulse {
        display: inline-block;
        animation: pulseRed 2s ease-in-out infinite;
    }

    @keyframes pulseRed {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.15);
        }
    }

    /* Responsive optimization */
    @media (max-width: 576px) {
        .alert {
            padding: 2rem 1rem;
        }

        .emoji-pulse {
            font-size: 38px;
        }
    }
</style>
