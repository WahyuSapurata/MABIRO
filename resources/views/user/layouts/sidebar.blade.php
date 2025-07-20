<div class="overlay" id="overlayMenu">
    <div class="expand-menu-grid container-fluid px-3">
        <div class="close-btn" id="closeExpand"><i class="fas fa-times"></i></div>
        <h3>Silahkan Pilih Layanan</h3>

        <div class="row justify-content-center gx-3 gy-4">
            <div class="col-6 col-sm-4 col-md-4">
                <a href="{{ route('register-penghuni') }}" class="service-box">
                    <iconify-icon icon="mdi:account-box" width="28" height="28"></iconify-icon>
                    <span>Registrasi Warga Baru</span>
                </a>
            </div>

            <div class="col-6 col-sm-4 color-md-4">
                <a href="{{ route('buku-tamu') }}" class="service-box">
                    <iconify-icon icon="mdi:book-account" width="28" height="28"></iconify-icon>
                    <span>Isi Buku Tamu</span>
                </a>
            </div>

            <div class="col-6 col-sm-4 color-md-4">
                <a href="{{ route('peminjaman') }}" class="service-box">
                    <iconify-icon icon="mdi:clipboard-list" width="28" height="28"></iconify-icon>
                    <span>Peminjaman Iventaris</span>
                </a>
            </div>

            {{-- <div class="col-6 col-sm-4 col-md-4">
                <a href="/sewa-aula/php" class="service-box">
                    <iconify-icon icon="mdi:home-city" width="28" height="28"></iconify-icon>
                    <span>Penyewaan Aula</span>
                </a>
            </div> --}}

            <div class="col-6 col-sm-4 col-md-4">
                <a href="{{ route('keluhan') }}" class="service-box">
                    <iconify-icon icon="mdi:message-alert" width="28" height="28"></iconify-icon>
                    <span>Kirim Laporan</span>
                </a>
            </div>

            <div class="col-6 col-sm-4 col-md-4">
                <a href="{{ route('tagihan') }}" class="service-box">
                    <iconify-icon icon="mdi:receipt-text" width="28" height="28"></iconify-icon>
                    <span>Lihat Informasi Tagihan</span>
                </a>
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
    <a href="{{ route('profile') }}" class="nav-item"><i class="fas fa-user"></i><span>Profile</span></a>
</nav>
