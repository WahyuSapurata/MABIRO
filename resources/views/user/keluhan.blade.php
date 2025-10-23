@extends('user.layouts.layout')
@php
    use Carbon\Carbon;
@endphp
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

    <div class="about-area center-responsive default-padding">
        <div class="container">
            <div class="row align-center">
                @if ($keluhan)
                    <div class="col-12 mb-3">
                        <div class="alert alert-info" role="alert">
                            Keluhanmu Pada Kategori {{ $keluhan->ketegori }} {{ $keluhan->status }}!
                        </div>
                    </div>
                @endif

                <form class="form-data" enctype="multipart/form-data">
                    <div class="row">
                        <div class="text-start col-12">
                            <input type="hidden" name="uuid_penghuni" value="{{ $data->uuid }}">
                            <div class="mb-10">
                                <label class="form-label">Nama Warga</label>
                                <input type="text" value="{{ $data->nama }}" readonly class="form-control">
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Kategori</label>
                                <select name="ketegori" class="form-control">
                                    <option value="">-- Pilih Kategori Laporan--
                                    </option>
                                    <option value="Umum">Umum</option>
                                    <option value="Fasilitas & Inventaris">Fasilitas & Inventaris</option>
                                    <option value="Logistik">Logistik</option>
                                    <option value="Pelanggaran">Pelanggaran</option>
                                </select>
                                <small class="text-danger d-block ketegori_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Isi Laporan / Keluhan</label>
                                <textarea name="keterangan" class="form-control" id="" cols="" rows="8"></textarea>
                                <small class="text-danger d-block keterangan_error"></small>
                            </div>

                        </div>
                    </div>

                    <div class="separator separator-dashed mt-8 mb-5"></div>
                    <div class="d-flex gap-2 justify-content-center justify-md-start">
                        <button type="submit" class="btn btn-primary-color btn-sm btn-submit d-flex align-items-center"><i
                                class="fas fa-paper-plane me-2"></i> Kirim</button>
                        <button type="reset" id="side_form_close" data-bs-dismiss="modal"
                            class="btn btn-light btn-cancel btn-sm d-flex align-items-center"
                            style="background-color: #ea443e65; color: #EA443E"><i class="fas fa-undo me-2"
                                style="color: #EA443E"></i>Reset</button>
                    </div>
                </form>

                <div class="main-content py-5">
                    <div>

                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h5 class="fw-semibold mb-2"
                                style="color:rgb(199, 7, 0); letter-spacing:1px; text-transform:uppercase;">
                                Riwayat
                            </h5>
                            <h2 class="fw-bold mb-3" style="font-size:2rem; color:#1e1e1e;">
                                Semua Riwayat Laporan & Keluhanmu
                            </h2>
                            <div
                                style="width:80px; height:5px;
                background:linear-gradient(90deg,#710b28,rgb(199, 7, 0));
                border-radius:50px;
                margin:0 auto;
                box-shadow:0 2px 8px #710b28;">
                            </div>
                        </div>

                        @if ($riwayat->isEmpty())
                            <div class="text-center py-5 text-secondary">
                                <iconify-icon icon="mdi:information-outline" width="52" class="mb-2"></iconify-icon>
                                <h6>Belum ada riwayat laporan yang ditambahkan</h6>
                            </div>
                        @else
                            <div class="row g-4">
                                @foreach ($riwayat as $rwt)
                                    @php
                                        $iconKategori = match ($rwt->ketegori) {
                                            'Umum' => 'ph:chat-circle-dots-duotone',
                                            'Fasilitas & Inventaris' => 'ph:buildings-duotone',
                                            'Logistik' => 'ph:package-duotone',
                                            'Pelanggaran' => 'ph:warning-octagon-duotone',
                                            default => 'ph:file-text-duotone',
                                        };

                                        switch ($rwt->status) {
                                            case 'Sudah Ditindaklanjuti':
                                                $statusIcon = 'mdi:check-circle-outline';
                                                $statusClass = 'bg-success-subtle text-success';
                                                break;
                                            case 'Sedang Diproses':
                                                $statusIcon = 'mdi:progress-clock';
                                                $statusClass = 'bg-warning-subtle text-warning';
                                                break;
                                            case 'Belum Ditindaklanjuti':
                                                $statusIcon = 'mdi:alert-circle-outline';
                                                $statusClass = 'bg-danger-subtle text-danger';
                                                break;
                                            default:
                                                $statusIcon = 'mdi:help-circle-outline';
                                                $statusClass = 'bg-secondary-subtle text-secondary';
                                                break;
                                        }
                                    @endphp

                                    <div class="col-lg-4 col-md-12">
                                        <div class="card-riwayat shadow-sm">
                                            <div class="card-header-top"
                                                style="background: linear-gradient(90deg,#710b28,rgb(199, 7, 0))">
                                                <div class="icon-wrapper">
                                                    <iconify-icon icon="{{ $iconKategori }}" width="35"
                                                        style="width: auto;"></iconify-icon>
                                                </div>
                                                <div class="kategori-info">
                                                    <h6 class="mb-0 fw-semibold text-light">{{ $rwt->ketegori }}</h6>
                                                    <span class="small text-light opacity-75">
                                                        {{ \Carbon\Carbon::parse($rwt->created_at)->translatedFormat('d F Y') }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="card-body-content">


                                                <h5 class="fw-bold mb-2 mt-1 text-dark" style="font-size: 18px;">Isi Laporan
                                                </h5>
                                                <p class="text-secondary small mb-3">{{ $rwt->keterangan }}</p>

                                                <div class="catatan-biro mt-auto pt-3">
                                                    <h6 class="fw-semibold text-dark mb-1 d-flex align-items-center">
                                                        <iconify-icon icon="mdi:comment-edit-outline" width="18"
                                                            class="me-1 text-danger flex-shrink-0">
                                                        </iconify-icon>
                                                        <span> Catatan Dari Biro</span>
                                                    </h6>
                                                    <p class="small text-muted mb-0">{{ $rwt->catatan ?? '-' }}</p>
                                                </div>
                                                <div class="text-md-start text-center">
                                                    <div class="status-badge {{ $statusClass }}">
                                                        <iconify-icon icon="{{ $statusIcon }}" width="17"
                                                            class="me-1"></iconify-icon>
                                                        {{ $rwt->status }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            let control = new Control();

            $(document).on('click', '#button-side-form', function() {
                control.overlay_form('Tambah', 'Penghuni');
            })

            $(document).on('submit', ".form-data", function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: 'POST',
                    url: '/keluhan-add',
                    data: new FormData($(".form-data")[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".text-danger").html("");
                        if (response.success == true) {
                            Swal
                                .fire({
                                    text: `Laporan telah di buat harapa tunggu info selanjutnya`,
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                                .then(function() {
                                    window.location.reload();
                                });
                        } else {
                            $("form")[0].reset();
                            $("#from_select").val(null).trigger("change");
                            // $(".form-select").val(null).trigger("change");
                            Swal.fire({
                                title: response.message,
                                text: response.data,
                                icon: "warning",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr) {
                        $(".text-danger").html("");
                        $.each(xhr.responseJSON["errors"], function(key, value) {
                            $(`.${key}_error`).html(value);
                        });
                    },
                });
            });
        });
    </script>
@endsection
<style>
    .card-riwayat {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.35s ease;
        height: 100%;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        animation: fadeIn 0.6s ease both;
    }

    .card-riwayat:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
    }

    /* 🔹 Header bagian atas */
    .card-header-top {
        display: flex;
        align-items: center;
        /* 🔹 ikon & teks rata tengah vertikal */
        justify-content: flex-start;
        /* 🔹 tetap sejajar kiri-kanan */
        gap: 12px;
        /* 🔹 jarak antara ikon & teks */
        padding: 0.9rem 1.2rem;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        color: #fff;
    }

    /* Icon wrapper */
    .icon-wrapper {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        /* 🔹 ikon tidak mengecil di layar kecil */
        transition: all 0.3s ease;
        width: 50px;
        height: 50px;
    }

    .icon-wrapper:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
    }

    /* Informasi kategori */
    .kategori-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: left;
    }

    .kategori-info h6 {
        font-size: 1rem;
    }

    /* 🧾 Isi konten */
    .card-body-content {
        padding: 1.5rem;
        padding-top: 10px;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-align: left;
    }

    /* 🟢 Status badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 8px;
        width: fit-content;
        text-transform: capitalize;
        margin-top: 10px;
    }

    .bg-success-subtle {
        background: #e8f9ef;
        color: #1b7b3a;
    }

    .bg-warning-subtle {
        background: #fff8e6;
        color: #f39c12;
    }

    .bg-danger-subtle {
        background: #fdeaea;
        color: #c62828;
    }

    .bg-secondary-subtle {
        background: #f4f4f4;
        color: #555;
    }

    /* ✏️ Catatan Biro */
    .catatan-biro {
        border-top: 1px dashed #eee;
        padding-top: 0.8rem;
        margin-top: auto;
        transition: all 0.3s ease;
    }

    .catatan-biro:hover {
        transform: translateX(3px);
        color: #b71c1c;
    }

    /* 📱 Responsiveness */
    @media (max-width: 992px) {
        .card-header-top {
            padding: 1rem 1.2rem;
        }

        .card-body-content {
            padding: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .card-header-top {
            gap: 10px;
            padding: 0.8rem 1rem;
        }

        .kategori-info h6 {
            font-size: 0.95rem;
        }

        .kategori-info span {
            font-size: 0.8rem;
        }


        .icon-wrapper {
            padding: 8px;
        }

        .kategori-info h6 {
            font-size: 0.95rem;
        }
    }

    /* ✨ Animasi fade-in */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Retina optimization */
    @media (min-resolution: 2dppx) {

        .card-riwayat,
        .status-badge,
        .kategori-info h6 {
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }
    }

    h6.d-flex.align-items-center iconify-icon {
        transition: transform 0.2s ease;
    }

    h6.d-flex.align-items-center:hover iconify-icon {
        transform: scale(1.1);
    }
</style>
