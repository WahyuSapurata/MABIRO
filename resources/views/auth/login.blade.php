<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <link rel="shortcut icon" href="{{ asset('Favicon.png') }}" />
    <title>{{ config('app.name') }} | Login</title>
    <meta charset="utf-8" />
    <meta property="og:description"
        content="Arvala Mockup is a professional product mockup template designed for digital goods. Perfect for creators and entrepreneurs." />
    <meta name="keywords"
        content="product mockup template, digital product mockup, marketplace mockup design, sell mockup templates, professional product mockups, digital goods mockup, mockup for creators, product presentation template, high-quality mockup designs, downloadable mockup templates, creative product mockups, mockup marketplace template, sell digital mockups, product display templates, mockup design for entrepreneurs, digital asset mockups, customizable mockup templates, premium mockup designs, mockup for digital products, product visualization templates">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Kilq - Professional Product Mockup Template for Digital Goods" />
    <meta property="og:description"
        content="Kilq is a dynamic product mockup template designed to help creators and entrepreneurs showcase their digital products with professional, high-quality mockups. Perfect for selling and presenting digital goods in a visually appealing way." />
    <meta property="og:url" content="https://arvalamockup.com/" />
    <meta property="og:site_name" content="Kilq Mockup" />
    <meta property="og:image" content="https://arvalamockup.com/logo_arvala.png" />
    <meta property="og:image:alt" content="Kilq Mockup Preview" />
    <link rel="canonical" href="https://arvalamockup.com/" />
    <meta name="google-site-verification" content="FnO2dJiuVYaHHdnvK8oXap9nXg8FuI7ayeh6i1J7nEE" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- Tambahkan ini di <head> HTML kamu -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body"
    class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column justify-content-center flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-none d-lg-grid justify-content-center align-items-center w-50 px-20 gap-3"
                style="background-color: #4417CE; justify-items: center; align-content: center">
                <img src="{{ asset('Mabiro.png') }}" style="width: 230px" alt="">
                <div style="font-size: 40px" class="text-white fw-bolder text-center py-5">Sistem Informasi Manajemen
                    Asrama
                </div>
                <div style="font-size: 18px" class="text-white text-center">Keluarga Pelajar Mahasiswa Balikpapan (KPMB)
                    Makassar
                </div>
                <a href="{{ route('beranda') }}"
                    class="btn btn-outline btn-outline btn-outline-white btn-active-light-white btn-active-color-dark btn-hover-scale mt-5"><i
                        class="fas fa-arrow-left text-white"></i> Kembali</a>
            </div>
            <!--begin::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <!--begin::Body-->
                    <h1 class="fw-bolder fs-2x mb-5 text-center text-primary">LOGIN</h1>

                    <div class="py-10" style="padding: 40px; border-radius: 20px; border: 2px solid #a6b7c7">
                        <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 10px;">
                            <div
                                class="d-flex justify-content-center align-items-center rounded-circle h-65px w-65px bg-primary">
                                <i class="far fa-user-circle text-white fs-2x"></i>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('login.login-proses') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="fw-semibold fs-4 text-primary">Masukkan data anda</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Username" name="username"
                                    value="{{ old('username') }}" autocomplete="off" class="form-control" />
                                @error('username')
                                    <small class="error text-danger">{{ $message }}</small>
                                @enderror
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <div class="position-relative">
                                            <input placeholder="Password" type="password" name="password"
                                                autocomplete="off" class="form-control" />
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Login</span>
                                    <!--end::Indicator label-->
                                </button>
                                <a href="" data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
                                    id="button-side-form" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Daftar
                                    jika belum punya akun!</a>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->

                        <div class="modal fade" tabindex="-1" id="kt_modal_1">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content shadow-none">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Registrasi Penghuni</h3>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                                            </svg>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <form class="form-data" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
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
                                                        <input type="text" name="password_hash"
                                                            class="form-control">
                                                        <small class="text-danger password_hash_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Tempat Lahir</label>
                                                        <input type="text" name="tempat_lahir"
                                                            class="form-control">
                                                        <small class="text-danger tempat_lahir_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <input type="text" id="tanggal_lahir"
                                                            class="form-control kt_datepicker_7" name="tanggal_lahir">
                                                        <small class="text-danger tanggal_lahir_error"></small>
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
                                                        <small class="text-danger agama_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <div>
                                                            <label class="form-label">Jenis Kelamin</label>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="jenis_kelamin"
                                                                    value="laki-laki" class="form-check-input"
                                                                    id="jenis_kelamin_laki">
                                                                <label class="form-check-label"
                                                                    for="jenis_kelamin_laki">Laki-laki</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="jenis_kelamin"
                                                                    value="perempuan" class="form-check-input"
                                                                    id="jenis_kelamin_perempuan">
                                                                <label class="form-check-label"
                                                                    for="jenis_kelamin_perempuan">Perempuan</label>
                                                            </div>
                                                        </div>
                                                        <small class="text-danger jenis_kelamin_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Alamat</label>
                                                        <textarea name="alamat" id="" cols="" rows="2" class="form-control"></textarea>
                                                        <small class="text-danger alamat_error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-10">
                                                        <label class="form-label">Universitas</label>
                                                        <input type="text" name="universitas"
                                                            class="form-control">
                                                        <small class="text-danger universitas_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Program Studi</label>
                                                        <input type="text" name="program_studi"
                                                            class="form-control">
                                                        <small class="text-danger program_studi_error"></small>
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
                                                        <small class="text-danger riwayat_pendidikan_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">No Hp</label>
                                                        <input type="text" name="no_hp" class="form-control">
                                                        <small class="text-danger no_hp_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <label class="form-label">Alasan</label>
                                                        <textarea name="alasan" id="" cols="" rows="2" class="form-control"></textarea>
                                                        <small class="text-danger alasan_error"></small>
                                                    </div>

                                                    <div class="mb-10">
                                                        <div>
                                                            <label class="form-label">Foto</label>
                                                        </div>
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-empty"
                                                            data-kt-image-input="true"
                                                            style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                                            <!--begin::Image preview wrapper-->
                                                            <div class="image-input-wrapper w-125px h-125px">
                                                            </div>
                                                            <!--end::Image preview wrapper-->

                                                            <!--begin::Edit button-->
                                                            <label
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>

                                                                <!--begin::Inputs-->
                                                                <input type="file" name="foto"
                                                                    accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit button-->

                                                            <!--begin::Cancel button-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel button-->

                                                            <!--begin::Remove button-->
                                                            <span
                                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                                title="Remove avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Remove button-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label d-block">Persetujuan</label>
                                                        <div class="form-check">
                                                            <input type="checkbox" name="persetujuan" value="1"
                                                                class="form-check-input" id="persetujuan">
                                                            <label class="form-check-label" for="persetujuan">
                                                                Saya menyetujui data yang saya isi
                                                            </label>
                                                        </div>
                                                        <small class="text-danger persetujuan_error"></small>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                            <div class="d-flex gap-5">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm btn-submit d-flex align-items-center"><i
                                                        class="bi bi-file-earmark-diff"></i> Simpan</button>
                                                <button type="reset" id="side_form_close" data-bs-dismiss="modal"
                                                    class="btn mr-2 btn-light btn-cancel btn-sm d-flex align-items-center"
                                                    style="background-color: #ea443e65; color: #EA443E"><i
                                                        class="bi bi-trash-fill"
                                                        style="color: #EA443E"></i>Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/custom/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script><!--begin::Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/panel.js') }}"></script>
    <!--end::Custom Javascript-->
    @if ($message = Session::get('failed'))
        <script>
            swal.fire({
                title: "Eror",
                text: "{{ $message }}",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    @if ($message = Session::get('success'))
        <script>
            swal.fire({
                title: "Sukses",
                text: "{{ $message }}",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    <script>
        let control = new Control();

        $(document).on('click', '#button-side-form', function() {
            control.overlay_form('Tambah', 'Penghuni');
        })

        $("#tanggal_lahir").flatpickr({
            dateFormat: "d-m-Y",
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();

            let type = $(this).attr('data-type');
            if (type == 'add') {
                control.submitFormMultipartData('/login/register-penghuni', 'Register', 'Penghuni', 'POST');
            }
        });
    </script>
</body>
<!--end::Body-->

</html>
