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

                <div class="main-content">
                    <div class="site-heading text-center">
                        <h5>Riwayat</h5>
                        <h2 class="area-title">Semua Riwayat Laporan & Keluhanmu</h2>
                        <div class="devider"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm text-left mb-table-custom table-spaced">
                                <thead class="thead-light text-uppercase text-xs">
                                    <tr class="mb-table-custom">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Isi Laporanmu</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Catatan Dari Biro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($riwayat as $rwt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($rwt->created_at)->translatedFormat('d-m-Y') }}
                                            </td>
                                            <td>{{ $rwt->keterangan }}</td>
                                            <td>{{ $rwt->ketegori }}</td>
                                            <td>
                                                @if ($rwt->status === 'Sudah Ditindaklanjuti')
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

                                            <td>{{ $rwt->catatan ?? '-' }}</td>
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
