@php
    $path = explode('/', Request::path());
    $role = auth()->user()->role;

    $dashboardRoutes = [
        'biro' => 'biro.dashboard-biro',
        'keuangan' => 'keuangan.dashboard-keuangan',
        'inventaris' => 'inventaris.dashboard-inventaris',
    ];

    $isActive = in_array($role, array_keys($dashboardRoutes)) && isset($path[1]) && $path[1] === 'dashboard-' . $role;
    $activeColor = $isActive ? 'mb-aside-menu-text fw-bolder' : 'text-white';
@endphp

<div class="aside-menu flex-column-fluid">
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
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="kt_aside_menu" data-kt-menu="true" style="gap: 6px;">

            <div class="menu-item">
                <a class="menu-link {{ $isActive ? 'mb-bg-active' : 'mb-bg-default' }}"
                    href="{{ route($dashboardRoutes[$role]) }}">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            {!! $isActive
                                ? '<i class="fas fa-tachometer-alt mb-aside-menu-text" font-size: 16px"></i>'
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
                        class="menu-link {{ $path[1] == 'data-pengguna' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-pengguna'
                                    ? '<i class="fas fa-user mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-user text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'data-pengguna' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                            Pengguna</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'warga_tamu' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'warga_tamu' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'warga_tamu'
                                    ? '<i class="fas fa-users mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-users text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'warga_tamu' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Warga
                            & Tamu</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <!--begin::Menu link-->
                            <a href="{{ route('biro.data-penghuni') }}"
                                class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'data-penghuni' ? 'mb-bg-active' : 'mb-bg-default' }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'data-penghuni'
                                            ? '<i class="fas fa-laptop-house mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-laptop-house text-white" font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'data-penghuni' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                                    Penghuni</span>
                            </a>
                            <!--end::Menu link-->
                        </div>
                    </div>

                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <!--begin::Menu link-->
                            <a href="{{ route('biro.data-tamu') }}"
                                class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'data-tamu' ? 'mb-bg-active' : 'mb-bg-default' }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'data-tamu'
                                            ? '<i class="fas fa-book-reader mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-book-reader text-white" font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'data-tamu' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                                    Tamu</span>
                            </a>
                            <!--end::Menu link-->
                        </div>
                    </div>

                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'keuangan' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'keuangan' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'keuangan'
                                    ? '<i class="fas fa-money-bill-wave mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-money-bill-wave text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'keuangan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Keuangan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    {{-- <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'pemasukan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.pemasukan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'pemasukan'
                                            ? '<i class="fas fa-clipboard mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-clipboard text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'pemasukan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Catatan
                                    Pemasukan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'pengeluaran' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.pengeluaran') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'pengeluaran'
                                            ? '<i class="fas fa-clipboard-list mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-clipboard-list text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'pengeluaran' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Catatan
                                    Pengeluaran</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'master-tagihan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.master-tagihan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'master-tagihan'
                                            ? '<i class="fas fa-database mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-database text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'master-tagihan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Master
                                    Tagihan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'tagihan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.tagihan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'tagihan'
                                            ? '<i class="fas fa-file-invoice-dollar mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-file-invoice-dollar text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'tagihan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">
                                    Tagihan Warga</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div> --}}

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'rekap-pembayaran' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.rekap-pembayaran') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'rekap-pembayaran'
                                            ? '<i class="fas fa-file-invoice mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-file-invoice text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'rekap-pembayaran' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">
                                    Rekap Tagihan</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'laporan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.laporan') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'laporan'
                                            ? '<i class="fas fa-book mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-book text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'laporan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Rekap
                                    Laporan Keuangan</span>
                            </a>
                            <!--end::Menu link-->
                        </div>
                    </div>
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'inventaris' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'inventaris' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'inventaris'
                                    ? '<i class="fas fa-dolly-flatbed mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-dolly-flatbed text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'inventaris' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Inventaris</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'data-inventaris' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.data-inventaris') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'data-inventaris'
                                            ? '<i class="fas fa-boxes mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-boxes text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'data-inventaris' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                                    Inventaris</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'data-peminjaman' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.data-peminjaman') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'data-peminjaman'
                                            ? '<i class="fas fa-people-carry mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-people-carry text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'data-peminjaman' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                                    Peminjaman</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                </div>

                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'kegiatan' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#"
                        class="menu-link py-3 {{ $path[1] == 'kegiatan' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'kegiatan'
                                    ? '<i class="fas fa-chart-line mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-chart-line text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'kegiatan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Kegiatan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'program' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.program') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'program'
                                            ? '<i class="fas fa-tasks mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-tasks text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'program' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Program
                                    Biro</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <!--begin::Menu link-->
                            <a href="{{ route('biro.jadwal-agenda') }}"
                                class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'jadwal-agenda' ? 'mb-bg-active' : 'mb-bg-default' }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'jadwal-agenda'
                                            ? '<i class="fas fa-calendar-alt mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-calendar-alt text-white" font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'jadwal-agenda' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Jadwal
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
                        class="menu-link py-3 {{ $path[1] == 'tentang' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'tentang'
                                    ? '<i class="fas fa-address-card mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-address-card text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'tentang' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Konten
                            Halaman</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'selayang-pandang' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.selayang-pandang') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'selayang-pandang'
                                            ? '<i class="fas fa-person-booth mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-person-booth text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'selayang-pandang' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Selayang
                                    Pandang</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link ps-7 {{ isset($path[2]) && $path[2] == 'fasilitas' ? 'mb-bg-active' : 'mb-bg-default' }}"
                                href="{{ route('biro.fasilitas') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'fasilitas'
                                            ? '<i class="fas fa-luggage-cart mb-aside-menu-text" font-size: 16px"></i>'
                                            : '<i class="fas fa-luggage-cart text-white" font-size: 16px"></i>' !!}
                                    </span>
                                </span>
                                <span
                                    class="menu-title {{ isset($path[2]) && $path[2] == 'fasilitas' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Gedung
                                    & Fasilitas</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('biro.absensi') }}"
                        class="menu-link {{ $path[1] == 'absensi' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'absensi'
                                    ? '<i class="fas fa-clipboard-list mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-clipboard-list text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'absensi' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Absensi
                            Piket</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('biro.keluhan') }}"
                        class="menu-link {{ $path[1] == 'keluhan' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'keluhan'
                                    ? '<i class="fas fa-flag mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-flag text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'keluhan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Laporan
                            & Keluhan</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('biro.arsip-dokumen') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'arsip-dokumen'
                                    ? '<i class="fas fa-folder-open mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-folder-open text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Arsip
                            Dokumen</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

            @if ($role === 'keuangan')
                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'pemasukan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.pemasukan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'pemasukan'
                                    ? '<i class="fas fa-clipboard mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-clipboard text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'pemasukan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Catatan
                            Pemasukan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'pengeluaran' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.pengeluaran') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'pengeluaran'
                                    ? '<i class="fas fa-clipboard-list mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-clipboard-list text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'pengeluaran' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Catatan
                            Pengeluaran</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'master-tagihan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.master-tagihan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'master-tagihan'
                                    ? '<i class="fas fa-database mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-database text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'master-tagihan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Master
                            Tagihan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'tagihan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.tagihan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'tagihan'
                                    ? '<i class="fas fa-file-invoice-dollar mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-file-invoice-dollar text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'tagihan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">
                            Tagihan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'rekap-pembayaran' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.rekap-pembayaran') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'rekap-pembayaran'
                                    ? '<i class="fas fa-file-invoice mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-file-invoice text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'rekap-pembayaran' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">
                            Rekap Tagihan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[2]) && $path[2] == 'laporan' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.laporan') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[2]) && $path[2] === 'laporan'
                                    ? '<i class="fas fa-book mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-book text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[2]) && $path[2] == 'laporan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Rekap
                            Laporan Keuangan</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('keuangan.keluhan') }}"
                        class="menu-link {{ $path[1] == 'keluhan' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'keluhan'
                                    ? '<i class="fas fa-flag mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-flag text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'keluhan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Laporan
                            & Keluhan</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('keuangan.arsip-dokumen') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'arsip-dokumen'
                                    ? '<i class="fas fa-folder-open mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-folder-open text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Arsip
                            Dokumen</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

            @if ($role === 'inventaris')
                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'data-inventaris' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('inventaris.data-inventaris') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-inventaris'
                                    ? '<i class="fas fa-boxes mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-boxes text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'data-inventaris' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                            Inventaris</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'data-peminjaman' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('inventaris.data-peminjaman') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'data-peminjaman'
                                    ? '<i class="fas fa-people-carry mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-people-carry text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'data-peminjaman' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Data
                            Peminjaman</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <div class="menu-item">
                    <!--begin::Menu link-->
                    <a href="{{ route('inventaris.keluhan') }}"
                        class="menu-link {{ $path[1] == 'keluhan' ? 'mb-bg-active' : 'mb-bg-default' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'keluhan'
                                    ? '<i class="fas fa-flag mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-flag text-white" font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span
                            class="menu-title {{ $path[1] == 'keluhan' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Laporan
                            & Keluhan</span>
                    </a>
                    <!--end::Menu link-->
                </div>

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'mb-bg-active' : 'mb-bg-default' }}"
                        href="{{ route('inventaris.arsip-dokumen') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'arsip-dokumen'
                                    ? '<i class="fas fa-folder-open mb-aside-menu-text" font-size: 16px"></i>'
                                    : '<i class="fas fa-folder-open text-white" font-size: 16px"></i>' !!}
                            </span>
                        </span>
                        <span
                            class="menu-title {{ isset($path[1]) && $path[1] == 'arsip-dokumen' ? 'mb-aside-menu-text fw-bolder' : 'text-white' }}">Arsip
                            Dokumen</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif


            {{-- <div class="d-md-none d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-grid">
                    @csrf
                    @method('GET')
                    <button type="submit" style="border: none;"
                        class="mabiro-btn btn btn-white py-2 px-3 d-flex align-items-center gap-3"
                        id="sign-out"><span>Keluar</span> <i class="mabiro-btn fas fa-sign-out-alt"></i></button>
                </form>

            </div> --}}


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
