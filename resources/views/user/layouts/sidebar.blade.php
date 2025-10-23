<div class="overlay" id="overlayMenu">
    <div class="expand-menu-grid container-fluid px-3">
        <div class="close-btn" id="closeExpand"><i class="fas fa-times"></i></div>
        <h3>Silahkan Pilih Layanan</h3>

        <div>
            <!-- Row 1 -->
            <div class="row justify-content-center gx-2 gy-3">
                <div class="mb-card-layanan col-4">
                    <a href="{{ route('registrasi-penghuni') }}" class="service-box">
                        <iconify-icon icon="mdi:account-box"></iconify-icon>
                        <span>Registrasi Warga Baru</span>
                    </a>
                </div>

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('buku-tamu') }}" class="service-box">
                        <iconify-icon icon="mdi:book-account"></iconify-icon>
                        <span>Isi Buku Tamu</span>
                    </a>
                </div>

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('daftar-tamu') }}" class="service-box">
                        <iconify-icon icon="mdi:account-multiple"></iconify-icon>
                        <span>Daftar Tamu</span>
                    </a>
                </div>


            </div>

            <!-- Row 2 -->
            <div class="row justify-content-center gx-2 gy-3">

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('peminjaman') }}" class="service-box">
                        <iconify-icon icon="mdi:clipboard-list"></iconify-icon>
                        <span>Peminjaman Inventaris</span>
                    </a>
                </div>

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('inventaris') }}" class="service-box">
                        <iconify-icon icon="mdi:package-variant"></iconify-icon>
                        <span>Lihat Inventaris</span>
                    </a>
                </div>

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('keluhan') }}" class="service-box">
                        <iconify-icon icon="mdi:message-alert"></iconify-icon>
                        <span>Kirim Laporan</span>
                    </a>
                </div>




            </div>

            <!-- Row 3 -->
            <div class="row justify-content-center gx-2 gy-3">

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('tagihan') }}" class="service-box">
                        <iconify-icon icon="mdi:receipt-text"></iconify-icon>
                        <span>Lihat Tagihan</span>
                    </a>
                </div>


                <div class="mb-card-layanan col-4">
                    <a href="{{ route('arsip') }}" class="service-box">
                        <iconify-icon icon="mdi:archive-outline"></iconify-icon>
                        <span>Lihat Arsip</span>
                    </a>
                </div>

                <div class="mb-card-layanan col-4">
                    <a href="{{ route('absensi') }}" class="service-box">
                        <iconify-icon icon="fluent:clipboard-task-list-rtl-24-filled"></iconify-icon>
                        <span>Absensi Piket</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>






<nav class="nav-bottom">
    <a href="{{ route('beranda') }}" class="nav-item"><i class="fas fa-home"></i><span>Home</span></a>
    <a href="{{ route('agenda') }}" class="nav-item"><i class="fas fa-calendar-alt"></i><span>Agenda</span></a>
    <div class="menu-button" id="menuBtn">
        <i>
            <svg width="30" height="30" viewBox="0 0 28 28" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" style="padding-left: 2px;">
                <rect x="4" y="4" width="8" height="8" rx="1" />
                <rect x="16" y="4" width="8" height="8" rx="1" />
                <rect x="4" y="16" width="8" height="8" rx="1" />
                <rect x="16" y="16" width="8" height="8" rx="1" />
            </svg>
        </i>
    </div>
    <a href="{{ route('kontak') }}" class="nav-item"><i class="fas fa-phone"></i><span>Kontak</span></a>
    {{-- <a href="{{ route('profile') }}" class="nav-item"><i class="fas fa-user"></i><span>Profile</span></a> --}}


    @if (auth()->check())
        {{-- Sudah login --}}
        <a href="{{ route('profile') }}" class="nav-item">
            <img src="{{ asset('public/penghuni/' . (auth()->user()->foto ?? 'default.jpg')) }}" class="rounded-circle"
                alt="Foto"
                style="
    width: 42px;
    height: 42px;
    object-fit: cover;
    object-position: top;
    margin-bottom: 8px;

">
        </a>
    @else
        {{-- Belum login --}}
        <a href="{{ route('profile') }}" class="nav-item">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
    @endif



</nav>
<style>
    .mb-card-layanan {
        padding: 6px;
    }

    .service-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        text-align: center;
        background: #7a0026;
        /* merah maroon */
        color: #fff;
        border-radius: 14px;
        width: 100%;
        height: 100%;
        padding: 18px 8px;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .service-box:hover {
        background: #8d0630;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .service-box iconify-icon {
        font-size: 26px;
        margin-bottom: 8px;
    }

    .service-box span {
        font-size: 0.85rem;
        font-weight: 600;
        line-height: 1.2;
        color: white;
    }

    /* --- GRID RESPONSIVE --- */
    @media (max-width: 575.98px) {
        .mb-card-layanan {
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }

        .service-box {
            padding: 14px 6px;
            border-radius: 10px;
        }

        .service-box span {
            font-size: 0.55rem;
            font-weight: 400;
        }
    }

    @media (min-width: 576px) and (max-width: 991.98px) {
        .mb-card-layanan {
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
    }

    @media (min-width: 992px) {
        .mb-card-layanan {
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
    }


    .row.fullwidth-row>.mb-card-layanan {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }


    /* Animasi hover utama */
    .service-box:hover {
        background: #91002c;
        transform: translateY(-5px);
        box-shadow: 0 10px 18px rgba(0, 0, 0, 0.2);
    }

    /* Efek highlight menyapu */
    .service-box::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;

        transition: all 0.6s ease;
    }

    .service-box:hover::after {
        left: 100%;
    }

    /* Ikon animasi */
    .service-box iconify-icon {
        font-size: 32px;
        margin-bottom: 8px;
        transition: all 0.4s ease;
    }

    .service-box:hover iconify-icon {
        transform: rotate(10deg) scale(1.15);
        color: #ffccd5;
    }

    /* Teks animasi */
    .service-box span {
        letter-spacing: 0.3px;
        opacity: 0.9;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .service-box:hover span {
        opacity: 1;
        transform: translateY(-2px);
    }
</style>
