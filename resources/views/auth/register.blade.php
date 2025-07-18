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
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label class="form-label">Nama Warga</label>
                                <input type="text" name="nama" class="form-control">
                                <small class="text-danger d-block nama_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control">
                                <small class="text-danger d-block username_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Password</label>
                                <input type="text" name="password_hash" class="form-control">
                                <small class="text-danger d-block password_hash_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control">
                                <small class="text-danger d-block tempat_lahir_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="text" id="tanggal_lahir" class="form-control kt_datepicker_7"
                                    name="tanggal_lahir">
                                <small class="text-danger d-block tanggal_lahir_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="islam">Islam</option>
                                    <option value="keristen">Keristen</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="katolik">Katolik</option>
                                </select>
                                <small class="text-danger d-block agama_error"></small>
                            </div>

                            <div class="mb-10">
                                <div>
                                    <label class="form-label">Jenis Kelamin</label>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="jenis_kelamin" value="laki-laki"
                                            class="form-check-input" id="jenis_kelamin_laki">
                                        <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="jenis_kelamin" value="perempuan"
                                            class="form-check-input" id="jenis_kelamin_perempuan">
                                        <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                    </div>
                                </div>
                                <small class="text-danger d-block jenis_kelamin_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" id="" cols="" rows="2" class="form-control"></textarea>
                                <small class="text-danger d-block alamat_error"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label class="form-label">Universitas</label>
                                <input type="text" name="universitas" class="form-control">
                                <small class="text-danger d-block universitas_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Program Studi</label>
                                <input type="text" name="program_studi" class="form-control">
                                <small class="text-danger d-block program_studi_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Riwayat Pendidikan</label>
                                <select name="riwayat_pendidikan" class="form-control">
                                    <option value="">-- Pilih Riwayat Pendidikan --
                                    </option>
                                    <option value="sd">SD</option>
                                    <option value="mts">MTS</option>
                                    <option value="sma">SMA</option>
                                </select>
                                <small class="text-danger d-block riwayat_pendidikan_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">No Hp</label>
                                <input type="text" name="no_hp" class="form-control">
                                <small class="text-danger d-block no_hp_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Alasan</label>
                                <textarea name="alasan" id="" cols="" rows="2" class="form-control"></textarea>
                                <small class="text-danger d-block alasan_error"></small>
                            </div>

                            <div class="mb-10">
                                <label class="form-label">Foto</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="foto" class="form-control">
                                <small class="text-danger d-block foto_error"></small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Persetujuan</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                        name="persetujuan" value="1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <small class="text-danger d-block persetujuan_error"></small>
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

            flatpickr("#tanggal_lahir", {
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
                    url: '/register-penghuni-add',
                    data: new FormData($(".form-data")[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".text-danger").html("");
                        if (response.success == true) {
                            Swal
                                .fire({
                                    text: `Register berhasil di lakukan`,
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
