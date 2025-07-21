@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row bg-primary py-3 rounded">
                <!--Begin Admin-->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="calon_penghuni" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #calon_penghuni {
                                            fill: #f4be2a
                                        }
                                    </style>
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">{{ $calon_penghuni }} Orang</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Calong Penghuni
                            </div>
                            <div class="d-grid mt-2">
                                <a href="{{ route('biro.data-penghuni') }}" class="btn btn-primary">Kelola detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="penghuni" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #penghuni {
                                            fill: #2a60f4
                                        }
                                    </style>
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">{{ $penghuni }} Orang</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Penghuni
                            </div>
                            <div class="d-grid mt-2">
                                <a href="{{ route('biro.data-penghuni') }}" class="btn btn-primary">Kelola detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="peminjaman" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #peminjaman {
                                            fill: #2adcf4
                                        }
                                    </style>
                                    <path
                                        d="M128 96c26.5 0 48-21.5 48-48S154.5 0 128 0 80 21.5 80 48s21.5 48 48 48zm384 0c26.5 0 48-21.5 48-48S538.5 0 512 0s-48 21.5-48 48 21.5 48 48 48zm125.7 372.1l-44-110-41.1 46.4-2 18.2 27.7 69.2c5 12.5 17 20.1 29.7 20.1 4 0 8-.7 11.9-2.3 16.4-6.6 24.4-25.2 17.8-41.6zm-34.2-209.8L585 178.1c-4.6-20-18.6-36.8-37.5-44.9-18.5-8-39-6.7-56.1 3.3-22.7 13.4-39.7 34.5-48.1 59.4L432 229.8 416 240v-96c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16v96l-16.1-10.2-11.3-33.9c-8.3-25-25.4-46-48.1-59.4-17.2-10-37.6-11.3-56.1-3.3-18.9 8.1-32.9 24.9-37.5 44.9l-18.4 80.2c-4.6 20 .7 41.2 14.4 56.7l67.2 75.9 10.1 92.6C130 499.8 143.8 512 160 512c1.2 0 2.3-.1 3.5-.2 17.6-1.9 30.2-17.7 28.3-35.3l-10.1-92.8c-1.5-13-6.9-25.1-15.6-35l-43.3-49 17.6-70.3 6.8 20.4c4.1 12.5 11.9 23.4 24.5 32.6l51.1 32.5c4.6 2.9 12.1 4.6 17.2 5h160c5.1-.4 12.6-2.1 17.2-5l51.1-32.5c12.6-9.2 20.4-20 24.5-32.6l6.8-20.4 17.6 70.3-43.3 49c-8.7 9.9-14.1 22-15.6 35l-10.1 92.8c-1.9 17.6 10.8 33.4 28.3 35.3 1.2 .1 2.3 .2 3.5 .2 16.1 0 30-12.1 31.8-28.5l10.1-92.6 67.2-75.9c13.6-15.5 19-36.7 14.4-56.7zM46.3 358.1l-44 110c-6.6 16.4 1.4 35 17.8 41.6 16.8 6.6 35.1-1.7 41.6-17.8l27.7-69.2-2-18.2-41.1-46.4z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">{{ $peminjaman }} Data</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Peminjaman
                            </div>
                            <div class="d-grid mt-2">
                                <a href="{{ route('biro.data-peminjaman') }}" class="btn btn-primary">Kelola detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body"
                            style="    height: 153.6px; display: grid; align-items: center; align-content: center;">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="saldo" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #saldo {
                                            fill: #f4312a
                                        }
                                    </style>
                                    <path
                                        d="M256 336h0c0-16.2 1.3-8.7-85.1-181.5-17.7-35.3-68.2-35.4-85.9 0C-2.1 328.8 0 320.3 0 336H0c0 44.2 57.3 80 128 80s128-35.8 128-80zM128 176l72 144H56l72-144zm512 160c0-16.2 1.3-8.7-85.1-181.5-17.7-35.3-68.2-35.4-85.9 0-87.1 174.3-85 165.8-85 181.5H384c0 44.2 57.3 80 128 80s128-35.8 128-80h0zM440 320l72-144 72 144H440zm88 128H352V153.3c23.5-10.3 41.2-31.5 46.4-57.3H528c8.8 0 16-7.2 16-16V48c0-8.8-7.2-16-16-16H383.6C369 12.7 346.1 0 320 0s-49 12.7-63.6 32H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h129.6c5.2 25.8 22.9 47 46.4 57.3V448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Saldo Kas
                            </div>
                            {{-- <div class="d-grid mt-2">
                                <a href="{{ route('biro.laporan') }}" class="btn btn-primary">Kelola detail</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Alert-->
            @if ($tagihan)
                <div class="alert alert-info d-flex align-items-center p-5 mt-5">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-info me-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                                fill="currentColor"></path>
                            <path
                                d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-dark">Konfirmasi Tagihan</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Ada {{ $tagihan }} tagihan perlu di konfirmasi, harap di cek terlebih dahulu. <a
                                class="fw-bolder" href="{{ route('biro.rekap-pembayaran') }}">Lihat Detail</a></span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            @endif
            <!--end::Alert-->
        </div>
        <!--end::Container-->
    </div>
@endsection
