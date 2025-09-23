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
                        </ul>
                    </li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    @if (!auth()->check())
                        <li class="d-lg-none d-block">
                            <a class="btn btn-primary" href="{{ route('login.login-akun') }}">Masuk</a>
                        </li>
                    @endif

                    <li class="d-lg-none d-lg-block">
                        <!-- Di dalam <body>, misalnya di footer atau sidebar -->
                        <button id="clear-cache-btn"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Tampilan
                        </button>
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
