@extends('layouts.layout')
{{-- @section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <div>Data Penghuni Asrama</div>
        </div>
        <!--begin::Title-->
        <button class="btn btn-success btn-sm " data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
            id="button-side-form"><i class="fa fa-plus-circle" style="color:#ffffff" aria-hidden="true"></i> Tambah
            Data</button>
        <!--end::Title-->
    </div>
    <!--end::Page title-->
@endsection --}}
@section('content')
    <!--start::Pengganti Toolbar-->
    <div
        class="container-fluid mb-topbar-dashboard d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between mb-4">

        <!-- Kiri: Judul dan Subjudul -->
        <div class="text-center text-md-start mb-5 mb-md-0">
            <h2 class="mb-1 mb-text-h2 mb-text-color-primary mb-brand-primary-color">Data Penghuni</h2>
            <p class="mb-0 mb-text-p18 mb-text-color-secondary">Asrama Mahasiswa Balikpapan KPMB Makassar</p>
        </div>

        <!-- Kanan: Tombol -->
        <div class="text-center text-md-end">
            <button class="btn mb-btn-tambah-data btn-sm " data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
                id="button-side-form"><i class="fa fa-plus-circle" style="color:#ffffff" aria-hidden="true"></i> Tambah
                Data</button>
        </div>

    </div>
    <!--end::Pengganti Toolbar-->


    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card bg-brand">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5 text-white">
                                <table id="kt_table_data" class="table table-rounded table-row-bordered table-row-gray-300">
                                    <thead class="text-center">
                                        <tr class="fw-bolder fs-6">
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Warga</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Agama</th>
                                            <th>Kampus</th>
                                            <th>Kamar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('side-form')
    <div id="side_form" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
        data-kt-drawer-toggle="#side_form_button" data-kt-drawer-close="#side_form_close" data-kt-drawer-width="">
        <!--begin::Card-->
        <div class="card mb-modal w-100">
            <!--begin::Card header-->
            <div class="card-header pe-5">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#"
                            class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1 title_side_form"></a>
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="side_form_close">
                        <i class="mb-close-button fas fa-times-circle"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body hover-scroll-overlay-y">
                <form class="form-data" enctype="multipart/form-data">

                    <input type="hidden" name="id">
                    <input type="hidden" name="uuid">

                    <div class="mb-10">
                        <label class="form-label">Nama Warga</label>
                        <input type="text" name="nama" class="form-control">
                        <small class="text-danger nama_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control">
                        <small class="text-danger username_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Password</label>
                        <input type="text" name="password_hash" class="form-control">
                        <small class="text-danger password_hash_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                        <small class="text-danger tempat_lahir_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" id="tanggal_lahir" class="form-control kt_datepicker_7" name="tanggal_lahir">
                        <small class="text-danger tanggal_lahir_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Agama</label>
                        <select name="agama" class="form-control" data-control="select2">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Katolik">Katolik</option>
                        </select>
                        <small class="text-danger agama_error"></small>
                    </div>

                    <div class="mb-10">
                        <div>
                            <label class="form-label">Jenis Kelamin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="jenis_kelamin" value="laki-laki" class="form-check-input"
                                id="jenis_kelamin_laki">
                            <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="jenis_kelamin" value="perempuan" class="form-check-input"
                                id="jenis_kelamin_perempuan">
                            <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                        </div>
                        <small class="text-danger jenis_kelamin_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Alamat Tempat Tinggal</label>
                        <textarea name="alamat" id="" cols="" rows="2" class="form-control"></textarea>
                        <small class="text-danger alamat_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Kampus / Perguruan Tinggi</label>
                        <input type="text" name="universitas" class="form-control">
                        <small class="text-danger universitas_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Jurusan / Program Studi</label>
                        <input type="text" name="program_studi" class="form-control">
                        <small class="text-danger program_studi_error"></small>
                    </div>

                    <div>
                        <div class="mb-5">
                            <label class="form-label">Riwayat Pendidikan</label>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Riwayat Pendidikan SD</label>
                            <input type="text" class="form-control" name="riwayat_pendidikan_sd">
                            <small class="text-danger riwayat_pendidikan_sd_error"></small>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Riwayat Pendidikan SMP</label>
                            <input type="text" class="form-control" name="riwayat_pendidikan_smp">
                            <small class="text-danger riwayat_pendidikan_smperror"></small>
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Riwayat Pendidikan SMA</label>
                            <input type="text" class="form-control" name="riwayat_pendidikan_sma">
                            <small class="text-danger riwayat_pendidikan_smaerror"></small>
                        </div>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">No. Handphone</label>
                        <input type="text" name="no_hp" class="form-control">
                        <small class="text-danger no_hp_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Alasan Tinggal Di Asrama</label>
                        <textarea name="alasan" id="" cols="" rows="2" class="form-control"></textarea>
                        <small class="text-danger alasan_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Kamar</label>
                        {{-- <input type="text" name="kamar" class="form-control">
                        <small class="text-danger kamar_error"></small> --}}
                        <select name="kamar" class="form-control" data-control="select2">
                            <option value="">-- Pilih Kamar --</option>
                            <option value="M01">M01</option>
                            <option value="M02">M02</option>
                            <option value="M03">M03</option>
                            <option value="M04">M04</option>
                            <option value="M05">M05</option>
                            <option value="M06">M06</option>
                            <option value="M07">M07</option>
                            <option value="M08">M08</option>
                            <option value="M09">M09</option>
                            <option value="M10">M10</option>
                            <option value="M11">M11</option>
                            <option value="M12">M12</option>
                            <option value="F01">F01</option>
                            <option value="F02">F02</option>
                            <option value="F03">F03</option>
                            <option value="F04">F04</option>
                            <option value="F06">F05</option>
                            <option value="F06">F06</option>
                            <option value="F07">F07</option>
                            <option value="F08">F08</option>
                            <option value="F09">F09</option>
                            <option value="F10">F10</option>
                            <option value="F11">F11</option>
                            <option value="F12">F12</option>
                            <option value="F13">F13</option>
                            <option value="F14">F14</option>
                        </select>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Foto</label>
                        <input type="file" accept="image/*" id="foto" class="form-control" name="foto">
                        <small class="text-danger foto_error"></small>

                        <div class="mt-3" id="logoInfoContainer"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Pernyataan</label>
                        <div class="form-check">
                            <input type="checkbox" name="persetujuan" value="1" class="form-check-input"
                                id="persetujuan">
                            <label class="form-check-label" for="persetujuan">
                                Menyutujui semua pernyataan
                            </label>
                        </div>
                        <small class="text-danger persetujuan_error"></small>
                    </div>


                    <div class="separator separator-dashed mt-8 mb-5"></div>
                    <div class="d-flex gap-5">
                        <button type="submit"
                            class="btn btn-mabiro-primary btn-sm btn-submit d-flex align-items-center"><i
                                class="fas fa-save text-white"></i> Simpan</button>
                        <button type="reset" id="side_form_close"
                            class="btn mr-2 btn-mabiro-grey btn-cancel btn-sm d-flex align-items-center"><i
                                class="fas fa-times text-white"></i>Batal</button>
                    </div>
                </form>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        $(".kt_datepicker_7").flatpickr({
            dateFormat: "d-m-Y",
        });

        $(document).on('click', '#button-side-form', function() {
            control.overlay_form('Tambah', 'Data Penghuni');
        })

        $(document).on('click', '.button-detail', function() {
            window.location.href = '/biro/warga_tamu/data-penghuni-detail/' + $(this).attr('data-uuid');
        })

        $('#foto').change(function() {
            previewImage(this);
        });

        function previewImage(input) {
            var logoInfoContainer = $('#logoInfoContainer');
            var logoError = $('.foto_error');

            // Reset error message
            logoError.text('');

            // Cek apakah file yang dipilih adalah foto
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Tampilkan foto
                    logoInfoContainer.html('<img id="img-foto" src="' + e.target.result + '" style="max-width:100%;">');
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Tampilkan pesan error jika file tidak valid
                logoError.text('Pilih file foto yang valid.');
                logoInfoContainer.html('');
            }
        }

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            let type = $(this).attr('data-type');
            if (type == 'add') {
                control.submitFormMultipartData('/biro/warga_tamu/data-penghuni-store', 'Tambah',
                    'Data Penghuni',
                    'POST');
            } else {
                let uuid = $("input[name='uuid']").val();
                control.submitFormMultipartData('/biro/warga_tamu/data-penghuni-update/' + uuid,
                    'Update',
                    'Data Penghuni', 'POST');
            }
        });

        $(document).on('click', '.button-update', function(e) {
            e.preventDefault();
            $(".form-data").attr("data-type", "update");
            $(".title_side_form").html(`Update Data Penghuni`);
            $(".text-danger").html("");
            let url = '/biro/warga_tamu/data-penghuni-show/' + $(this).attr('data-uuid');
            $.ajax({
                url: url,
                method: "GET",
                success: function(res) {
                    if (res.success == true) {
                        $.each(res.data, function(x, y) {
                            const $selectField = $("select[name='" + x + "[]']");

                            if ($("input[name='" + x + "']").is(":radio")) {
                                $("input[name='" + x + "'][value='" + y + "']").prop(
                                    "checked",
                                    true
                                );
                            } else if ($("input[name='" + x + "']").attr("type") === "file") {
                                const logoInfoContainer = $('#logoInfoContainer');
                                logoInfoContainer.html(
                                    `<img id="img-foto" src="/public/penghuni/${y}" style="max-width:100%;">`
                                );

                            } else if ($("input[name='" + x + "']").attr("type") ===
                                "checkbox") {
                                // Checkbox (anggap bernilai 1 jika dicentang)
                                if (y == 1 || y === true || y === "1") {
                                    $("input[name='" + x + "']").prop("checked", true);
                                } else {
                                    $("input[name='" + x + "']").prop("checked", false);
                                }
                            } else {
                                $("input[name='" + x + "']").val(y);
                                $("select[name='" + x + "']").val(y);
                                $("textarea[name='" + x + "']").val(y);
                                $("select[name='" + x + "']").trigger("change");
                            }
                        });
                    }

                },
                error: function(xhr) {
                    alert("gagal");
                },
            });
        })

        $(document).on('click', '.button-delete', function(e) {
            e.preventDefault();
            let url = '/biro/warga_tamu/data-penghuni-delete/' + $(this).attr('data-uuid');
            let label = $(this).attr('data-label');
            control.ajaxDelete(url, label)
        })

        $(document).on('click', '.button-convir', function(e) {
            e.preventDefault();
            control.submitFormMultipartData('/biro/warga_tamu/data-penghuni-konfirmasi/' + $(this).attr(
                    'data-uuid'),
                'Update',
                'Data Penghuni', 'POST');
        })

        $(document).on('keyup', '#search_', function(e) {
            e.preventDefault();
            control.searchTable(this.value);
        })

        const initDatatable = async () => {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }

            // Initialize DataTable
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: '/biro/warga_tamu/data-penghuni-get',
                columns: [{
                    data: null,
                    className: 'mb-kolom-nomor align-content-center',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'foto',
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        let result;
                        if (data) {
                            result =
                                `
                                <!--begin::Overlay-->
                                <a class="d-block overlay fancybox" data-fancybox="lightbox-group" href="{{ asset('/public/penghuni/${data}') }}">
                                    <!--begin::Image-->
                                    <div class="mb-profil-warga overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded"
                                        style="background-image:url('/public/penghuni/${data}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
                            `;
                        } else {
                            result =
                                `
                                    <div class="mb-profil-warga brand-accent-color d-flex align-items-center justify-content-center">
                                        <i class="fas fa-user text-white" font-size: 18px"></i>
                                    </div>
                                `;
                        }
                        return result;
                    }
                }, {
                    data: 'nama',
                    className: 'text-center align-content-center',
                }, {
                    data: 'tanggal_lahir',
                    className: 'text-center align-content-center',
                }, {
                    data: 'agama',
                    className: 'text-center align-content-center',
                }, {
                    data: 'universitas',
                    className: 'text-center align-content-center',
                }, {
                    data: 'kamar',
                    className: 'text-center align-content-center',
                    render: function(data, type, row, meta) {
                        let result;
                        if (data) {
                            result = data;
                        } else {
                            result = 'Belum ditentukan';
                        }
                        return result;
                    }
                }, {
                    data: 'status',
                    className: 'text-center align-content-center',
                    render: function(data, type, row, meta) {
                        let result;
                        if (data == "Belum Dikonfirmasi") {
                            result =
                                `
                                <div class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger p-2 py-1">
                                    ${data}
                                </div>
                            `;
                        } else {
                            result =
                                `
                                <div class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success p-2 py-1">
                                    ${data}
                                </div>
                            `;
                        }

                        return result;
                    }
                }, {
                    data: 'uuid',
                }],
                columnDefs: [{
                    targets: -1,
                    title: 'Aksi',
                    className: 'mb-kolom-aksi',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        if (full.status == "Terkonfirmasi") {
                            return `
                            <a href="javascript:;" type="button" data-uuid="${data}" data-kt-drawer-show="true" data-kt-drawer-target="#side_form" class="btn btn-primary button-update btn-icon btn-sm">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.5 16.2738C3.5 17.8891 4.80945 19.1986 6.42474 19.1986H10.8479L11.1681 17.9178C11.3139 17.3347 11.6155 16.8022 12.0405 16.3771L17.3522 11.0655C17.9947 10.423 18.8591 10.138 19.6986 10.2103V5.92474C19.6986 4.30945 18.3891 3 16.7738 3H10.6994V7.27463C10.6994 8.88992 9.38992 10.1994 7.77463 10.1994H3.5V16.2738ZM9.34949 3.39597L3.89597 8.84949H7.77463C8.6444 8.84949 9.34949 8.1444 9.34949 7.27463V3.39597ZM17.9886 11.7018L12.6769 17.0135C12.3672 17.3231 12.1475 17.7112 12.0412 18.1361L11.6293 19.7836C11.4503 20.5 12.0993 21.1491 12.8157 20.9699L14.4632 20.558C14.8881 20.4518 15.2761 20.2321 15.5859 19.9224L20.8975 14.6107C21.7008 13.8074 21.7008 12.5051 20.8975 11.7018C20.0943 10.8984 18.7919 10.8984 17.9886 11.7018Z" fill="white"/>
                                <mask id="mask0_1953_23043" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3" width="19" height="18">
                                <path d="M3.5 16.2738C3.5 17.8891 4.80945 19.1986 6.42474 19.1986H10.8479L11.1681 17.9178C11.3139 17.3347 11.6155 16.8022 12.0405 16.3771L17.3522 11.0655C17.9947 10.423 18.8591 10.138 19.6986 10.2103V5.92474C19.6986 4.30945 18.3891 3 16.7738 3H10.6994V7.27463C10.6994 8.88992 9.38992 10.1994 7.77463 10.1994H3.5V16.2738ZM9.34949 3.39597L3.89597 8.84949H7.77463C8.6444 8.84949 9.34949 8.1444 9.34949 7.27463V3.39597ZM17.9886 11.7018L12.6769 17.0135C12.3672 17.3231 12.1475 17.7112 12.0412 18.1361L11.6293 19.7836C11.4503 20.5 12.0993 21.1491 12.8157 20.9699L14.4632 20.558C14.8881 20.4518 15.2761 20.2321 15.5859 19.9224L20.8975 14.6107C21.7008 13.8074 21.7008 12.5051 20.8975 11.7018C20.0943 10.8984 18.7919 10.8984 17.9886 11.7018Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_23043)">
                                <rect x="0.5" width="24" height="24" fill="white"/>
                                </g>
                                </svg>
                            </a>

                            <a href="javascript:;" type="button" data-uuid="${data}" data-label="Data Penghuni" class="btn btn-danger button-delete btn-icon btn-sm ${full.role == 'biro' ? 'disabled' : ''}">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.78571 3H20.2143C20.9244 3 21.5 3.58547 21.5 4.30769V4.96154C21.5 5.68376 20.9244 6.26923 20.2143 6.26923H4.78571C4.07563 6.26923 3.5 5.68376 3.5 4.96154V4.30769C3.5 3.58547 4.07563 3 4.78571 3ZM5.07475 7.60448C5.11609 7.58598 5.16081 7.57654 5.20598 7.57679H19.792C19.8372 7.57654 19.8819 7.58598 19.9232 7.60448C19.9646 7.62299 20.0016 7.65016 20.0319 7.6842C20.0623 7.71825 20.0852 7.75842 20.0992 7.80208C20.1133 7.84575 20.1181 7.89193 20.1134 7.93763L19.0579 18.259V18.2676C19.0027 18.7448 18.7772 19.1848 18.4241 19.5041C18.0711 19.8235 17.6151 19.9999 17.1426 19.9999H7.85776C7.38517 20.0001 6.92897 19.8237 6.57575 19.5044C6.22252 19.1851 5.99688 18.745 5.94165 18.2676C5.94143 18.2646 5.94143 18.2616 5.94165 18.2586L4.88455 7.93763C4.87986 7.89193 4.8847 7.84575 4.89874 7.80208C4.91278 7.75842 4.93571 7.71825 4.96604 7.6842C4.99637 7.65016 5.03341 7.62299 5.07475 7.60448ZM15.3481 15.173C15.3146 15.0933 15.2659 15.0211 15.2048 14.9608L13.4092 13.1345L15.2048 11.3082C15.3224 11.185 15.3877 11.0196 15.3864 10.8479C15.3851 10.6761 15.3175 10.5118 15.198 10.3903C15.0786 10.2689 14.917 10.2002 14.7481 10.1989C14.5792 10.1977 14.4167 10.2641 14.2956 10.3838L12.5004 12.2097L10.7048 10.3838C10.5837 10.2641 10.4211 10.1977 10.2523 10.1989C10.0834 10.2002 9.9218 10.2689 9.80237 10.3903C9.68293 10.5118 9.61527 10.6761 9.614 10.8479C9.61273 11.0196 9.67795 11.185 9.79557 11.3082L11.5912 13.1345L9.79557 14.9608C9.67795 15.084 9.61273 15.2494 9.614 15.4211C9.61527 15.5929 9.68293 15.7572 9.80237 15.8786C9.9218 16 10.0834 16.0688 10.2523 16.07C10.4211 16.0712 10.5837 16.0048 10.7048 15.8851L12.5004 14.0593L14.2956 15.8851C14.3549 15.9473 14.4258 15.9969 14.5042 16.0309C14.5826 16.065 14.6668 16.0829 14.752 16.0835C14.8372 16.0842 14.9217 16.0676 15.0005 16.0347C15.0794 16.0019 15.151 15.9534 15.2113 15.8921C15.2716 15.8309 15.3193 15.758 15.3516 15.6778C15.3839 15.5977 15.4003 15.5117 15.3997 15.4251C15.3991 15.3384 15.3815 15.2527 15.3481 15.173Z" fill="white"/>
                                <mask id="mask0_1953_23051" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3" width="19" height="17">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.78571 3H20.2143C20.9244 3 21.5 3.58547 21.5 4.30769V4.96154C21.5 5.68376 20.9244 6.26923 20.2143 6.26923H4.78571C4.07563 6.26923 3.5 5.68376 3.5 4.96154V4.30769C3.5 3.58547 4.07563 3 4.78571 3ZM5.07475 7.60448C5.11609 7.58598 5.16081 7.57654 5.20598 7.57679H19.792C19.8372 7.57654 19.8819 7.58598 19.9232 7.60448C19.9646 7.62299 20.0016 7.65016 20.0319 7.6842C20.0623 7.71825 20.0852 7.75842 20.0992 7.80208C20.1133 7.84575 20.1181 7.89193 20.1134 7.93763L19.0579 18.259V18.2676C19.0027 18.7448 18.7772 19.1848 18.4241 19.5041C18.0711 19.8235 17.6151 19.9999 17.1426 19.9999H7.85776C7.38517 20.0001 6.92897 19.8237 6.57575 19.5044C6.22252 19.1851 5.99688 18.745 5.94165 18.2676C5.94143 18.2646 5.94143 18.2616 5.94165 18.2586L4.88455 7.93763C4.87986 7.89193 4.8847 7.84575 4.89874 7.80208C4.91278 7.75842 4.93571 7.71825 4.96604 7.6842C4.99637 7.65016 5.03341 7.62299 5.07475 7.60448ZM15.3481 15.173C15.3146 15.0933 15.2659 15.0211 15.2048 14.9608L13.4092 13.1345L15.2048 11.3082C15.3224 11.185 15.3877 11.0196 15.3864 10.8479C15.3851 10.6761 15.3175 10.5118 15.198 10.3903C15.0786 10.2689 14.917 10.2002 14.7481 10.1989C14.5792 10.1977 14.4167 10.2641 14.2956 10.3838L12.5004 12.2097L10.7048 10.3838C10.5837 10.2641 10.4211 10.1977 10.2523 10.1989C10.0834 10.2002 9.9218 10.2689 9.80237 10.3903C9.68293 10.5118 9.61527 10.6761 9.614 10.8479C9.61273 11.0196 9.67795 11.185 9.79557 11.3082L11.5912 13.1345L9.79557 14.9608C9.67795 15.084 9.61273 15.2494 9.614 15.4211C9.61527 15.5929 9.68293 15.7572 9.80237 15.8786C9.9218 16 10.0834 16.0688 10.2523 16.07C10.4211 16.0712 10.5837 16.0048 10.7048 15.8851L12.5004 14.0593L14.2956 15.8851C14.3549 15.9473 14.4258 15.9969 14.5042 16.0309C14.5826 16.065 14.6668 16.0829 14.752 16.0835C14.8372 16.0842 14.9217 16.0676 15.0005 16.0347C15.0794 16.0019 15.151 15.9534 15.2113 15.8921C15.2716 15.8309 15.3193 15.758 15.3516 15.6778C15.3839 15.5977 15.4003 15.5117 15.3997 15.4251C15.3991 15.3384 15.3815 15.2527 15.3481 15.173Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_23051)">
                                <rect x="0.5" width="24" height="24" fill="white"/>
                                </g>
                                </svg>
                            </a>

                            <a href="javascript:;" type="button" data-uuid="${data}" class="btn btn-info button-detail btn-icon btn-sm ${full.role == 'biro' ? 'disabled' : ''}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 576 512" fill="white"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M572.5 241.4C518.3 135.6 410.9 64 288 64S57.7 135.6 3.5 241.4a32.4 32.4 0 0 0 0 29.2C57.7 376.4 165.1 448 288 448s230.3-71.6 284.5-177.4a32.4 32.4 0 0 0 0-29.2zM288 400a144 144 0 1 1 144-144 143.9 143.9 0 0 1 -144 144zm0-240a95.3 95.3 0 0 0 -25.3 3.8 47.9 47.9 0 0 1 -66.9 66.9A95.8 95.8 0 1 0 288 160z"/></svg>
                            </a>
                        `;
                        } else {
                            return `
                            <a href="javascript:;" type="button" data-uuid="${data}" data-kt-drawer-show="true" data-kt-drawer-target="#side_form" class="btn btn-primary button-update btn-icon btn-sm">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.5 16.2738C3.5 17.8891 4.80945 19.1986 6.42474 19.1986H10.8479L11.1681 17.9178C11.3139 17.3347 11.6155 16.8022 12.0405 16.3771L17.3522 11.0655C17.9947 10.423 18.8591 10.138 19.6986 10.2103V5.92474C19.6986 4.30945 18.3891 3 16.7738 3H10.6994V7.27463C10.6994 8.88992 9.38992 10.1994 7.77463 10.1994H3.5V16.2738ZM9.34949 3.39597L3.89597 8.84949H7.77463C8.6444 8.84949 9.34949 8.1444 9.34949 7.27463V3.39597ZM17.9886 11.7018L12.6769 17.0135C12.3672 17.3231 12.1475 17.7112 12.0412 18.1361L11.6293 19.7836C11.4503 20.5 12.0993 21.1491 12.8157 20.9699L14.4632 20.558C14.8881 20.4518 15.2761 20.2321 15.5859 19.9224L20.8975 14.6107C21.7008 13.8074 21.7008 12.5051 20.8975 11.7018C20.0943 10.8984 18.7919 10.8984 17.9886 11.7018Z" fill="white"/>
                                <mask id="mask0_1953_23043" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3" width="19" height="18">
                                <path d="M3.5 16.2738C3.5 17.8891 4.80945 19.1986 6.42474 19.1986H10.8479L11.1681 17.9178C11.3139 17.3347 11.6155 16.8022 12.0405 16.3771L17.3522 11.0655C17.9947 10.423 18.8591 10.138 19.6986 10.2103V5.92474C19.6986 4.30945 18.3891 3 16.7738 3H10.6994V7.27463C10.6994 8.88992 9.38992 10.1994 7.77463 10.1994H3.5V16.2738ZM9.34949 3.39597L3.89597 8.84949H7.77463C8.6444 8.84949 9.34949 8.1444 9.34949 7.27463V3.39597ZM17.9886 11.7018L12.6769 17.0135C12.3672 17.3231 12.1475 17.7112 12.0412 18.1361L11.6293 19.7836C11.4503 20.5 12.0993 21.1491 12.8157 20.9699L14.4632 20.558C14.8881 20.4518 15.2761 20.2321 15.5859 19.9224L20.8975 14.6107C21.7008 13.8074 21.7008 12.5051 20.8975 11.7018C20.0943 10.8984 18.7919 10.8984 17.9886 11.7018Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_23043)">
                                <rect x="0.5" width="24" height="24" fill="white"/>
                                </g>
                                </svg>
                            </a>

                            <a href="javascript:;" type="button" data-uuid="${data}" data-label="Data Penghuni" class="btn btn-danger button-delete btn-icon btn-sm ${full.role == 'biro' ? 'disabled' : ''}">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.78571 3H20.2143C20.9244 3 21.5 3.58547 21.5 4.30769V4.96154C21.5 5.68376 20.9244 6.26923 20.2143 6.26923H4.78571C4.07563 6.26923 3.5 5.68376 3.5 4.96154V4.30769C3.5 3.58547 4.07563 3 4.78571 3ZM5.07475 7.60448C5.11609 7.58598 5.16081 7.57654 5.20598 7.57679H19.792C19.8372 7.57654 19.8819 7.58598 19.9232 7.60448C19.9646 7.62299 20.0016 7.65016 20.0319 7.6842C20.0623 7.71825 20.0852 7.75842 20.0992 7.80208C20.1133 7.84575 20.1181 7.89193 20.1134 7.93763L19.0579 18.259V18.2676C19.0027 18.7448 18.7772 19.1848 18.4241 19.5041C18.0711 19.8235 17.6151 19.9999 17.1426 19.9999H7.85776C7.38517 20.0001 6.92897 19.8237 6.57575 19.5044C6.22252 19.1851 5.99688 18.745 5.94165 18.2676C5.94143 18.2646 5.94143 18.2616 5.94165 18.2586L4.88455 7.93763C4.87986 7.89193 4.8847 7.84575 4.89874 7.80208C4.91278 7.75842 4.93571 7.71825 4.96604 7.6842C4.99637 7.65016 5.03341 7.62299 5.07475 7.60448ZM15.3481 15.173C15.3146 15.0933 15.2659 15.0211 15.2048 14.9608L13.4092 13.1345L15.2048 11.3082C15.3224 11.185 15.3877 11.0196 15.3864 10.8479C15.3851 10.6761 15.3175 10.5118 15.198 10.3903C15.0786 10.2689 14.917 10.2002 14.7481 10.1989C14.5792 10.1977 14.4167 10.2641 14.2956 10.3838L12.5004 12.2097L10.7048 10.3838C10.5837 10.2641 10.4211 10.1977 10.2523 10.1989C10.0834 10.2002 9.9218 10.2689 9.80237 10.3903C9.68293 10.5118 9.61527 10.6761 9.614 10.8479C9.61273 11.0196 9.67795 11.185 9.79557 11.3082L11.5912 13.1345L9.79557 14.9608C9.67795 15.084 9.61273 15.2494 9.614 15.4211C9.61527 15.5929 9.68293 15.7572 9.80237 15.8786C9.9218 16 10.0834 16.0688 10.2523 16.07C10.4211 16.0712 10.5837 16.0048 10.7048 15.8851L12.5004 14.0593L14.2956 15.8851C14.3549 15.9473 14.4258 15.9969 14.5042 16.0309C14.5826 16.065 14.6668 16.0829 14.752 16.0835C14.8372 16.0842 14.9217 16.0676 15.0005 16.0347C15.0794 16.0019 15.151 15.9534 15.2113 15.8921C15.2716 15.8309 15.3193 15.758 15.3516 15.6778C15.3839 15.5977 15.4003 15.5117 15.3997 15.4251C15.3991 15.3384 15.3815 15.2527 15.3481 15.173Z" fill="white"/>
                                <mask id="mask0_1953_23051" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3" width="19" height="17">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.78571 3H20.2143C20.9244 3 21.5 3.58547 21.5 4.30769V4.96154C21.5 5.68376 20.9244 6.26923 20.2143 6.26923H4.78571C4.07563 6.26923 3.5 5.68376 3.5 4.96154V4.30769C3.5 3.58547 4.07563 3 4.78571 3ZM5.07475 7.60448C5.11609 7.58598 5.16081 7.57654 5.20598 7.57679H19.792C19.8372 7.57654 19.8819 7.58598 19.9232 7.60448C19.9646 7.62299 20.0016 7.65016 20.0319 7.6842C20.0623 7.71825 20.0852 7.75842 20.0992 7.80208C20.1133 7.84575 20.1181 7.89193 20.1134 7.93763L19.0579 18.259V18.2676C19.0027 18.7448 18.7772 19.1848 18.4241 19.5041C18.0711 19.8235 17.6151 19.9999 17.1426 19.9999H7.85776C7.38517 20.0001 6.92897 19.8237 6.57575 19.5044C6.22252 19.1851 5.99688 18.745 5.94165 18.2676C5.94143 18.2646 5.94143 18.2616 5.94165 18.2586L4.88455 7.93763C4.87986 7.89193 4.8847 7.84575 4.89874 7.80208C4.91278 7.75842 4.93571 7.71825 4.96604 7.6842C4.99637 7.65016 5.03341 7.62299 5.07475 7.60448ZM15.3481 15.173C15.3146 15.0933 15.2659 15.0211 15.2048 14.9608L13.4092 13.1345L15.2048 11.3082C15.3224 11.185 15.3877 11.0196 15.3864 10.8479C15.3851 10.6761 15.3175 10.5118 15.198 10.3903C15.0786 10.2689 14.917 10.2002 14.7481 10.1989C14.5792 10.1977 14.4167 10.2641 14.2956 10.3838L12.5004 12.2097L10.7048 10.3838C10.5837 10.2641 10.4211 10.1977 10.2523 10.1989C10.0834 10.2002 9.9218 10.2689 9.80237 10.3903C9.68293 10.5118 9.61527 10.6761 9.614 10.8479C9.61273 11.0196 9.67795 11.185 9.79557 11.3082L11.5912 13.1345L9.79557 14.9608C9.67795 15.084 9.61273 15.2494 9.614 15.4211C9.61527 15.5929 9.68293 15.7572 9.80237 15.8786C9.9218 16 10.0834 16.0688 10.2523 16.07C10.4211 16.0712 10.5837 16.0048 10.7048 15.8851L12.5004 14.0593L14.2956 15.8851C14.3549 15.9473 14.4258 15.9969 14.5042 16.0309C14.5826 16.065 14.6668 16.0829 14.752 16.0835C14.8372 16.0842 14.9217 16.0676 15.0005 16.0347C15.0794 16.0019 15.151 15.9534 15.2113 15.8921C15.2716 15.8309 15.3193 15.758 15.3516 15.6778C15.3839 15.5977 15.4003 15.5117 15.3997 15.4251C15.3991 15.3384 15.3815 15.2527 15.3481 15.173Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_23051)">
                                <rect x="0.5" width="24" height="24" fill="white"/>
                                </g>
                                </svg>
                            </a>

                            <a href="javascript:;" type="button" data-uuid="${data}" class="btn btn-primary button-convir btn-icon btn-sm">
                                <svg id="svg-button" xmlns="http://www.w3.org/2000/svg" width="2em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--> <style>
                                    #svg-button {
                                        fill: white
                                    }
                                </style> <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            </a>

                            <a href="javascript:;" type="button" data-uuid="${data}" class="btn btn-info button-detail btn-icon btn-sm ${full.role == 'biro' ? 'disabled' : ''}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 576 512" fill="white"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M572.5 241.4C518.3 135.6 410.9 64 288 64S57.7 135.6 3.5 241.4a32.4 32.4 0 0 0 0 29.2C57.7 376.4 165.1 448 288 448s230.3-71.6 284.5-177.4a32.4 32.4 0 0 0 0-29.2zM288 400a144 144 0 1 1 144-144 143.9 143.9 0 0 1 -144 144zm0-240a95.3 95.3 0 0 0 -25.3 3.8 47.9 47.9 0 0 1 -66.9 66.9A95.8 95.8 0 1 0 288 160z"/></svg>
                            </a>
                        `;
                        }
                    },
                }],

                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.context[0]._iDisplayStart;
                    var rowIndex = startIndex + index + 1;
                    $('td', row).eq(0).html(rowIndex);
                },
            });
        };

        $(function() {
            initDatatable();
        });

        // $('#export-excel').click(function(e) {
        //     e.preventDefault();
        //     window.open(`/biro/warga_tamu/data-penghuni-export`, "_blank");
        // });
    </script>
@endsection
