<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Solion - IT Solutions Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#710B28">
    <link rel="apple-touch-icon" href="/icon-192x192.png">

    <!-- ========== Page Title ========== -->
    <title>{{ config('app.name') . ' | ' . $module }}</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('assets-landing/img/favicon.png') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('assets-landing/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/elegant-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/flaticon-set.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- ========== End Stylesheet ========== -->

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

</head>

<body>

    <!-- Preloader Start -->
    <div id="app-splash">
        <div class="app-loader">
            <div class="global-loader-container">
                <div class="global-loader">
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                </div>
            </div>
            <img class="logo-preloader" src="{{ asset('assets-landing/img/logo-mabiro-light.svg') }}">
        </div>
    </div>
    <!-- Preloader Ends -->

    <!-- Header
    ============================================= -->
    @include('user.layouts.header')
    <!-- End Header -->

    <!-- Start Content
    ============================================= -->
    @yield('content')
    <!-- End Content -->


    <!-- Start Footer
    ============================================= -->
    {{-- @include('user.layouts.footer') --}}
    <!-- End Footer -->

    @include('user.layouts.sidebar')

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <script src="{{ asset('assets-landing/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/count-to.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/validnavs.js') }}"></script>
    <script src="{{ asset('assets-landing/js/gsap.js') }}"></script>
    <script src="{{ asset('assets-landing/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/SplitText.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/main.js') }}"></script>
    <script src="{{ asset('assets-landing/js/navbar-bottom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/panel.js') }}"></script>

    @yield('scripts')

    @if (session('error'))
        <script>
            Swal
                .fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: '{{ session('error') }}',
                    showConfirmButton: true,
                    // timer: 1500
                });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal
                .fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                    // timer: 1500
                });
        </script>
    @endif

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js')
                .then(() => console.log('✅ Service Worker Registered'))
                .catch(err => console.error('❌ SW Gagal:', err));
        }
    </script>


</body>

</html>
