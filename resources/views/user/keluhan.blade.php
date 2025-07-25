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
                            <input type="hidden" value="{{ $data->uuid }}">
                            <div class="mb-10">
                                <label class="form-label">Nama Warga</label>
                                <input type="text" value="{{ $data->nama }}" class="form-control">
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Kategori</label>
                                <select name="kategori" class="form-control">
                                    <option value="">-- Pilih Kategori Laporan--
                                    </option>
                                    <option value="Umum">Umum</option>
                                    <option value="Fasilitas & Inventaris">Fasilitas & Inventaris</option>
                                    <option value="Logistik">Logistik</option>
                                    <option value="Pelanggaran">Pelanggaran</option>
                                </select>
                                <small class="text-danger d-block kategori_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="" cols="" rows="8"></textarea>
                                <small class="text-danger d-block keterangan_error"></small>
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
                                    text: `Laporan keluhan anda telah di buat harapa tunggu info selanjutnya`,
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
