<!-- Header
    ============================================= -->
<header>
    <!-- Start Navigation -->
    <nav
        class="navbar mobile-sidenav navbar-sticky navbar-default nav-border validnavs navbar-fixed white no-background">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container-xl">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container d-flex justify-content-between align-items-center">


            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/index.php">
                    <img src="{{ asset('assets-landing/img/logo-mabiro-light.svg') }}" class="logo logo-display"
                        alt="Logo">
                    <img src="{{ asset('assets/media/logo-mabiro.svg') }}" class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>
                <div class="collapse-header">
                    <img src="{{ asset('assets/media/logo-mabiro.svg') }}" alt="Logo">

                </div>

                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('selayang-pandang') }}">Selayang Pandang</a></li>
                            <li><a href="{{ route('pengelola') }}">Pengelola Asrama</a></li>
                            <li><a href="{{ route('program') }}">Program</a></li>
                            <li><a href="{{ route('fasilitas') }}">Gedung & Fasilitas</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('agenda') }}">Agenda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('registrasi-penghuni') }}">Registrasi Warga Baru</a></li>
                            <li><a href="{{ route('buku-tamu') }}">Registrasi Tamu</a></li>
                            <li><a href="{{ route('peminjaman') }}">Ajukan Peminjaman</a></li>
                            <li><a href="{{ route('keluhan') }}">Kirim Laporan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Arsip & Laporan</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('rekap') }}">Rekapitulasi Keuangan</a></li>
                            <li><a href="{{ route('inventaris') }}">Daftar Inventaris</a></li>
                            <li><a href="{{ route('arsip') }}">Download Arsip & Dokumen</a></li>
                            <li><a href="{{ route('daftar-tamu') }}">Daftar Tamu</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="d-lg-none d-block" style="margin-top: 15px;">
                        <div class="d-flex align-items-center justify-content-start gap-3">


                            <!-- Tombol Login -->
                            @if (!auth()->check())
                                <a class="btn btn-login-sidebar d-flex align-items-center justify-content-center"
                                    href="{{ route('login.login-akun') }}" style="min-height: 42px;">
                                    <i class="fas fa-sign-in-alt me-2" style="padding-right: 8px;"></i>
                                    <span> Masuk</span>
                                </a>
                            @else
                                <a class="btn btn-login-sidebar d-flex align-items-center justify-content-center"
                                    href="{{ route('logout') }}" style="min-height: 42px;">
                                    <span>Keluar </span><i class="fas fa-sign-out-alt" style="padding-left: 8px;"></i>
                                </a>
                            @endif

                            <div class="d-flex gap-2">
                                <button id="clear-cache-btn"
                                    class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 42px; height: 42px; border: none;">
                                    <i class="fas fa-sync-alt"></i>
                                </button>

                                <button id="install-pwa-btn"
                                    class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 42px; height: 42px; border: none;" title="Install App">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                    </li>




                </ul>
            </div><!-- /.navbar-collapse -->

            <div>
                <ul class="attr-nav align-items-center display-flex">
                    <!-- Switch -->
                    <li>

                        <div class="theme-toggle-wrapper">
                            <label class="theme-switch">
                                <input type="checkbox" id="theme-switch">
                                <span class="slider-switch">
                                    <span class="circle-switch">
                                        <iconify-icon class="sun-icon" icon="mdi:weather-sunny"></iconify-icon>
                                        <iconify-icon class="moon-icon" icon="mdi:weather-night"></iconify-icon>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </li>
                    <!-- Tombol Masuk -->
                    <li class="d-none d-lg-block">
                        @if (!auth()->check())
                            <button type="button" class="btn btn-login"><a
                                    href="{{ route('login.login-akun') }}">Masuk</a></button>
                        @endif
                    </li>

                </ul>
            </div>
        </div>
        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Header -->

<script>
    document.getElementById('clear-cache-btn').addEventListener('click', function() {
        if (confirm(
                'Apakah Anda yakin ingin mereset cache dan reload halaman? Ini akan update tampilan ke versi terbaru.'
            )) {
            // Hard reload: true berarti bypass cache
            window.location.reload(true);
        }
    });
</script>


<script>
    let deferredPrompt;

    // Tangkap event 'beforeinstallprompt' (disimpan agar bisa dipicu nanti)
    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;

        // Tampilkan tombol install setelah event diterima
        const installBtn = document.getElementById('install-pwa-btn');
        installBtn.style.display = 'flex';
    });

    // Fungsi ketika tombol diklik
    document.getElementById('install-pwa-btn').addEventListener('click', async () => {
        if (deferredPrompt) {
            deferredPrompt.prompt(); // Menampilkan prompt install bawaan browser

            const {
                outcome
            } = await deferredPrompt.userChoice;
            console.log(`User response: ${outcome}`);

            deferredPrompt = null; // Reset agar tidak muncul dua kali
            document.getElementById('install-pwa-btn').style.display = 'none';
        } else {
            alert("App sudah terpasang atau belum memenuhi syarat PWA.");
        }
    });

    // Sembunyikan tombol secara default (nanti muncul otomatis jika PWA siap)
    document.getElementById('install-pwa-btn').style.display = 'none';
</script>
