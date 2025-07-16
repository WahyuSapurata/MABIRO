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
                    <img src="{{ asset('assets-landing/img/logo-mabiro.svg') }}" class="logo logo-scrolled"
                        alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <div class="collapse-header">
                    <img src="{{ asset('assets-landing/img/logo-mabiro.svg') }}" alt="Logo">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                </div>

                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="/index.php">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang</a>
                        <ul class="dropdown-menu">
                            <li><a href="/selayang-pandang.php">Selayang Pandang</a></li>
                            <li><a href="/pengelola.php">Pengelola Asrama</a></li>
                            <li><a href="/pengelola.php">Program</a></li>
                            <li><a href="/pengelola.php">Fasilitas Asrama</a></li>
                        </ul>
                    </li>
                    <li><a href="/agenda.php">Agenda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a href="/registrasi-warga.php">Registrasi Warga Baru</a></li>
                            <li><a href="/registrasi-tamu.php">Registrasi Tamu</a></li>
                            <li><a href="/form-peminjaman.php">Ajukan Peminjaman</a></li>
                            <li><a href="/form-sewa-aula.php">Penyewaan Aula</a></li>
                            <li><a href="/kirim-laporan.php">Kirim Laporan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Arsip & Laporan</a>
                        <ul class="dropdown-menu">
                            <li><a href="/rekapitulasi-keuangan.php">Rekapitulasi Keuangan</a></li>
                            <li><a href="/daftar-inventaris.php">Daftar Inventaris</a></li>
                            <li><a href="/arsip-dokumen.php">Download Arsip & Dokumen</a></li>
                        </ul>
                    </li>
                    <li><a href="/kontak.php">Kontak</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->

            <div>
                <ul class="attr-nav align-items-center display-flex">
                    <!-- Switch -->
                    <li>
                        <button id="theme-switch">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px">
                                <path
                                    d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px">
                                <path
                                    d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z" />
                            </svg>
                        </button>
                    </li>
                    <!-- Tombol Masuk -->
                    <li>
                        <button type="button" class="btn btn-login"><a
                                href="{{ route('login.login-akun') }}">Masuk</a></button>
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
