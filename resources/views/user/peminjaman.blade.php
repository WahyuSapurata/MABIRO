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

    <div class="about-area center-responsive default-padding">
        <div class="container">
            <div class="row align-center">
                <form class="form-data" enctype="multipart/form-data">
                    <div class="mb-10">
                        <label class="form-label">Organisasi</label>
                        <input type="text" name="organisasi" class="form-control">
                        <small class="text-danger d-block organisasi_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" class="form-control">
                        <small class="text-danger d-block penanggung_jawab_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="barang" class="form-control">
                        <small class="text-danger d-block barang_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">No. Telp/WA</label>
                        <input type="number" name="nomor_telepon" class="form-control">
                        <small class="text-danger d-block nomor_telepon_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Tanggal Peminjaman</label>
                        <input type="text" id="tanggal_pinjam" class="form-control" name="tanggal_pinjam">
                        <small class="text-danger d-block tanggal_pinjam_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Durasi Peminjaman (hari)</label>
                        <input type="number" name="durasi_peminjaman" class="form-control">
                        <small class="text-danger d-block durasi_peminjaman_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">File Surat</label>
                        <input type="file" name="surat" accept=".pdf" class="form-control">
                        <small class="text-danger d-block surat_error"></small>
                    </div>

                    <div class="separator separator-dashed mt-8 mb-5"></div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-submit d-flex align-items-center"><i
                                class="fas fa-save me-2"></i> Simpan</button>
                        <button type="reset" id="side_form_close" data-bs-dismiss="modal"
                            class="btn btn-light btn-cancel btn-sm d-flex align-items-center"
                            style="background-color: #ea443e65; color: #EA443E"><i class="fas fa-trash-alt me-2"
                                style="color: #EA443E"></i>Reset</button>
                    </div>
                </form>
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

            flatpickr("#tanggal_pinjam", {
                dateFormat: "d-m-Y"
            });

            $(document).on('submit', ".form-data", function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    type: 'POST',
                    url: '/peminjaman-add',
                    data: new FormData($(".form-data")[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".text-danger").html("");
                        if (response.success == true) {
                            Swal
                                .fire({
                                    text: `Peminjaman telah di proses, Harap Menunggu info selanjutnya`,
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
