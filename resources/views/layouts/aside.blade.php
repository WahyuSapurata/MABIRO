@php
    $path = explode('/', Request::path());
    $role = auth()->user()->role;

    $dashboardRoutes = [
        'biro' => 'biro.dashboard-biro',
        'keuangan' => 'keuangan.dashboard-keuangan',
        'inventaris' => 'inventaris.dashboard-inventaris',
    ];

    $isActive = in_array($role, array_keys($dashboardRoutes)) && isset($path[1]) && $path[1] === 'dashboard-' . $role;
    $activeColor = $isActive ? 'text-primary fw-bolder' : 'text-white';
@endphp

<div class="aside-menu bg-primary flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y mb-5 mb-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <script>
            // Ambil elemen menu menggunakan JavaScript
            var menu = document.getElementById('kt_aside_menu_wrapper');

            // Set tinggi maksimum dan penanganan overflow menggunakan JavaScript
            if (menu) {
                menu.style.maxHeight = '73vh'; // Set tinggi maksimum
            }
        </script>
        <!--begin::Menu-->
        <div class="menu menu-column mt-2 menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="kt_aside_menu" data-kt-menu="true" style="gap: 6px;">

            <div class="menu-item">
                <a class="menu-link {{ $isActive ? 'bg-white' : 'bg-secondary' }}"
                    href="{{ route($dashboardRoutes[$role]) }}">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            {!! $isActive
                                ? '<i class="fas fa-tachometer-alt text-primary" font-size: 16px"></i>'
                                : '<i class="fas fa-tachometer-alt text-white" font-size: 16px"></i>' !!}
                        </span>
                    </span>
                    <span class="menu-title {{ $activeColor }}">Dashboard</span>
                </a>
            </div>

            @if ($role === 'biro')
                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('biro.data-pengguna') }}"
                        class="menu-link {{ $path[1] == 'data-pengguna' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-pengguna'
                                    ? '<i class="fas fa-user text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-user text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'data-pengguna' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                            Pengguna</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('biro.data-penghuni') }}"
                        class="menu-link {{ $path[1] == 'data-penghuni' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-penghuni'
                                    ? '<i class="fas fa-laptop-house text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-laptop-house text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'data-penghuni' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                            Penghuni</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'keuangan' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'keuangan' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'keuangan'
                                    ? '<i class="fas fa-money-bill-wave text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-money-bill-wave text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'keuangan' ? 'text-primary fw-bolder' : 'text-white' }}">Keuangan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'pemasukan' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.pemasukan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'pemasukan'
                                            ? '<i class="fas fa-clipboard text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-clipboard text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'pemasukan' ? 'text-primary fw-bolder' : 'text-white' }}">Catatan
                                    Pemasukan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'pengeluaran' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.pengeluaran') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'pengeluaran'
                                            ? '<i class="fas fa-clipboard-list text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-clipboard-list text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'pengeluaran' ? 'text-primary fw-bolder' : 'text-white' }}">Catatan
                                    Pengeluaran</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'master-tagihan' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.master-tagihan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'master-tagihan'
                                            ? '<i class="fas fa-database text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-database text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'master-tagihan' ? 'text-primary fw-bolder' : 'text-white' }}">Master
                                    Tagihan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'tagihan' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.tagihan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'tagihan'
                                            ? '<i class="fas fa-file-invoice-dollar text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-file-invoice-dollar text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'tagihan' ? 'text-primary fw-bolder' : 'text-white' }}">
                                    Tagihan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'rekap-pembayaran' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.rekap-pembayaran') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'rekap-pembayaran'
                                            ? '<i class="fas fa-file-invoice text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-file-invoice text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'rekap-pembayaran' ? 'text-primary fw-bolder' : 'text-white' }}">
                                    Rekap Tagihan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'inventaris' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'inventaris' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'inventaris'
                                    ? '<i class="fas fa-dolly-flatbed text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-dolly-flatbed text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'inventaris' ? 'text-primary fw-bolder' : 'text-white' }}">Inventaris</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'data-inventaris' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.data-inventaris') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'data-inventaris'
                                            ? '<i class="fas fa-boxes text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-boxes text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'data-inventaris' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                                    Inventaris</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'data-peminjaman' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.data-peminjaman') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'data-peminjaman'
                                            ? '<i class="fas fa-people-carry text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-people-carry text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'data-peminjaman' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                                    Peminjaman</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'arsip-dokumen' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.arsip-dokumen') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'arsip-dokumen'
                                            ? '<i class="fas fa-folder-open text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-folder-open text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'arsip-dokumen' ? 'text-primary fw-bolder' : 'text-white' }}">Arsip
                                    Dokumen</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'kegiatan' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'kegiatan' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'kegiatan'
                                    ? '<i class="fas fa-chart-line text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-chart-line text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'kegiatan' ? 'text-primary fw-bolder' : 'text-white' }}">Kegiatan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'program' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.program') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'program'
                                            ? '<i class="fas fa-tasks text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-tasks text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'program' ? 'text-primary fw-bolder' : 'text-white' }}">Program</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <!--begin::Menu link-->
                            <a href="{{ route('biro.jadwal-agenda') }}"
                                class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'jadwal-agenda' ? 'bg-white' : 'bg-secondary' }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'jadwal-agenda'
                                            ? '<i class="fas fa-calendar-alt text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-calendar-alt text-white" font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'jadwal-agenda' ? 'text-primary fw-bolder' : 'text-white' }}">Jadwal
                                    & Agenda</span>
                            </a>
                            <!--end::Menu link-->
                        </div>
                    </div>
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'tentang' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'tentang' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'tentang'
                                    ? '<i class="fas fa-address-card text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-address-card text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'tentang' ? 'text-primary fw-bolder' : 'text-white' }}">Tentang</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'selayang-pandang' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.selayang-pandang') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'selayang-pandang'
                                            ? '<i class="fas fa-person-booth text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-person-booth text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'selayang-pandang' ? 'text-primary fw-bolder' : 'text-white' }}">Selayang
                                    Pandang</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'fasilitas' ? 'bg-white' : 'bg-secondary' }}"
                                href="{{ route('biro.fasilitas') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'fasilitas'
                                            ? '<i class="fas fa-luggage-cart text-primary" font-size: 16px"></i>'
                                            : '<i class="fas fa-luggage-cart text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'fasilitas' ? 'text-primary fw-bolder' : 'text-white' }}">Gedung
                                    & Fasilitas</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('biro.keluhan') }}"
                        class="menu-link {{ $path[1] == 'keluhan' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'keluhan'
                                    ? '<i class="fas fa-flag text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-flag text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'keluhan' ? 'text-primary fw-bolder' : 'text-white' }}">Laporan
                            & Keluhan</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('biro.data-tamu') }}"
                        class="menu-link {{ $path[1] == 'data-tamu' ? 'bg-white' : 'bg-secondary' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-tamu'
                                    ? '<i class="fas fa-book-reader text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-book-reader text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'data-tamu' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                            Tamu</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'laporan' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('biro.laporan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'laporan'
                                    ? '<i class="fas fa-book text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-book text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'laporan' ? 'text-primary fw-bolder' : 'text-white' }}">Laporan</span>
                    </a>
                    <!--end::Menu link-->
                </div>
            @endif

            @if ($role === 'keuangan')
                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'pemasukan' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('keuangan.pemasukan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'pemasukan'
                                    ? '<i class="fas fa-clipboard text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-clipboard text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'pemasukan' ? 'text-primary fw-bolder' : 'text-white' }}">Catatan
                            Pemasukan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'pengeluaran' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('keuangan.pengeluaran') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'pengeluaran'
                                    ? '<i class="fas fa-clipboard-list text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-clipboard-list text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'pengeluaran' ? 'text-primary fw-bolder' : 'text-white' }}">Catatan
                            Pengeluaran</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'master-tagihan' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('keuangan.master-tagihan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'master-tagihan'
                                    ? '<i class="fas fa-database text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-database text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'master-tagihan' ? 'text-primary fw-bolder' : 'text-white' }}">Master
                            Tagihan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'tagihan' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('keuangan.tagihan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'tagihan'
                                    ? '<i class="fas fa-file-invoice-dollar text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-file-invoice-dollar text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'tagihan' ? 'text-primary fw-bolder' : 'text-white' }}">
                            Tagihan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'rekap-pembayaran' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('keuangan.rekap-pembayaran') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'rekap-pembayaran'
                                    ? '<i class="fas fa-file-invoice text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-file-invoice text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'rekap-pembayaran' ? 'text-primary fw-bolder' : 'text-white' }}">
                            Rekap Tagihan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('keuangan.arsip-dokumen') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'arsip-dokumen'
                                    ? '<i class="fas fa-folder-open text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-folder-open text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'text-primary fw-bolder' : 'text-white' }}">Arsip
                            Dokumen</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

            @if ($role === 'inventaris')
                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'data-inventaris' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('inventaris.data-inventaris') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-inventaris'
                                    ? '<i class="fas fa-boxes text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-boxes text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'data-inventaris' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                            Inventaris</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'data-peminjaman' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('inventaris.data-peminjaman') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-peminjaman'
                                    ? '<i class="fas fa-people-carry text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-people-carry text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'data-peminjaman' ? 'text-primary fw-bolder' : 'text-white' }}">Data
                            Peminjaman</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'bg-white' : 'bg-secondary' }}"
                        href="{{ route('inventaris.arsip-dokumen') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'arsip-dokumen'
                                    ? '<i class="fas fa-folder-open text-primary" font-size: 16px"></i>'
                                    : '<i class="fas fa-folder-open text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'text-primary fw-bolder' : 'text-white' }}">Arsip
                            Dokumen</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

            {{-- <div class="menu-item">
                <a class="menu-link  {{ $path[0] === 'ubahpassword' ? 'active' : '' }}"
                    href="{{ route('ubahpassword') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <img src="{{ $path[0] === 'ubahpassword' ? url('admin/assets/media/icons/aside/ubahpasswordact.svg') : url('/admin/assets/media/icons/aside/ubahpassworddef.svg') }}"
                                alt="">
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title"
                        style="{{ $path[0] === 'ubahpassword' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Ubah
                        Password</span>
                </a>
            </div> --}}

        </div>
        <!--end::Menu-->
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            // $(".menu-link").hover(function(){
            //     $(this).css("background", "#282EAD");
            // }, function(){
            //     $(this).css("background", "none");
            // });
        });
    </script>
@endsection
