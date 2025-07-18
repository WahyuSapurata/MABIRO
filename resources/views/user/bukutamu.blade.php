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
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-10">
                                <label class="form-label">Nama Tamu</label>
                                <input type="text" name="nama_tamu" class="form-control">
                                <small class="text-danger d-block nama_tamu_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="" cols="" rows="5"></textarea>
                                <small class="text-danger d-block alamat_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Tujuan</label>
                                <input type="text" name="tujuan" class="form-control">
                                <small class="text-danger d-block tujuan_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="text" id="tanggal_masuk" class="form-control kt_datepicker_7"
                                    name="tanggal_masuk">
                                <small class="text-danger d-block tanggal_masuk_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Tanggal Keluar</label>
                                <input type="text" id="tanggal_keluar" class="form-control kt_datepicker_7"
                                    name="tanggal_keluar">
                                <small class="text-danger d-block tanggal_keluar_error"></small>
                            </div>
                        </div>
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

            flatpickr("#tanggal_masuk", {
                dateFormat: "d-m-Y"
            });

            flatpickr("#tanggal_keluar", {
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
                    url: '/data-tamu-add',
                    data: new FormData($(".form-data")[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".text-danger").html("");
                        if (response.success == true) {
                            Swal
                                .fire({
                                    text: `Buku tamu berhasil di buat`,
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
