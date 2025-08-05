@extends('user.layouts.layout')
@section('content')
    <!-- Hero -->
    <div class="banner-area auto-height banner-style-nine text-center text-light shadow theme-hard background-move bg-cover"
        style="background-image: url({{ asset('assets-landing/img/banner/asrama.png') }});">
        <div class="item-box">
            <div class="item">
                <div class="container">
                    <div class="row align-center">

                        <div>
                            <div class="content">
                                <!-- <div class="videos-button" class="wow fadeInUp" data-wow-delay="300ms">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a href="https://www.youtube.com/watch?v=35mvh-2oII8" class="popup-youtube video-button"><i class="fas fa-play"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                <h2 class="wow fadeInLeft text-hero" data-wow-delay="500ms">Sistem Informasi
                                    Manajemen<strong>Asrama Mahasiswa Balikpapan</strong></h2>
                                <h3 class="wow fadeInLeft text-hero" data-wow-delay="500ms">Keluarga Pelajar Mahasiswa
                                    Balikpapan (KPMB) Makassar</h3>
                                <div class="button wow fadeInUp" data-wow-delay="700ms">
                                    <a class="btn btn-theme effect btn-md"
                                        href="{{ route('registrasi-penghuni') }}">Registrasi Warga Baru</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bottom-shape"></div>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Fitur Sistem -->
    <div class="services-style-nine text-center default-padding-bottom bottom-less">
        <div class="container">
            <div class="services-style-nine-items">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="mb-card-fitur item h-100 w-100 d-flex flex-column text-center p-4 shadow-sm">
                            <i class="fas fa-users fa-2x mb-3"></i>
                            <h5 class="text-fitur"><a>Pengelolaan Data Penghuni</a></h5>
                            <p class="mb-auto">
                                Kelola data penghuni asrama secara terpusat, mulai dari pendaftaran, penentuan kamar, hingga
                                status penghuni.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="mb-card-fitur item h-100 w-100 d-flex flex-column text-center p-4 shadow-sm">
                            <i class="fas fa-wallet fa-2x mb-3"></i>
                            <h5 class="text-fitur"><a>Manajemen Keuangan</a></h5>
                            <p class="mb-auto">
                                Kelola catatan pemasukan dan pengeluaran asrama yang praktis dan efisien dalam bentuk
                                laporan keuangan yang terstruktur.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="mb-card-fitur item h-100 w-100 d-flex flex-column text-center p-4 shadow-sm">
                            <i class="fas fa-boxes fa-2x mb-3"></i>
                            <h5 class="text-fitur"><a>Manajemen Inventaris</a></h5>
                            <p class="mb-auto">
                                Pantau dan kelola barang inventaris asrama, termasuk penempatan, kondisi, dan jumlahnya
                                secara berkala.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="mb-card-fitur item h-100 w-100 d-flex flex-column text-center p-4 shadow-sm">
                            <i class="fas fa-calendar-alt fa-2x mb-3"></i>
                            <h5 class="text-fitur"><a>Manajemen Jadwal & Agenda</a></h5>
                            <p class="mb-auto">
                                Atur dan umumkan jadwal kegiatan rutin serta event asrama agar seluruh penghuni mendapatkan
                                informasi tepat waktu.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="mb-card-fitur item h-100 w-100 d-flex flex-column text-center p-4 shadow-sm">
                            <i class="fas fa-comment-dots fa-2x mb-3"></i>
                            <h5 class="text-fitur"><a>Manajemen Pelaporan</a></h5>
                            <p class="mb-auto">
                                Fasilitasi penghuni dalam menyampaikan keluhan atau laporan dan pantau status
                                penyelesaiannya secara transparan.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="mb-card-fitur item h-100 w-100 d-flex flex-column text-center p-4 shadow-sm">
                            <i class="fas fa-file-archive fa-2x mb-3"></i>
                            <h5 class="text-fitur"><a>Manajemen Arsip & Dokumen</a></h5>
                            <p class="mb-auto">
                                Simpan dan kelola arsip penting serta dokumen administratif asrama dalam format digital yang
                                aman dan mudah diakses.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fitur Sistem -->


    <!-- Start Galeri -->
    <div class="case-studies-area bg-gray default-padding-bottom">
        <!-- Fixed BG -->
        <!-- End Fixed BG -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5>Galeri Kegiatan</h5>
                        <h2 class="area-title">Dokumentasi Terbaru Asrama Kami</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fill">
            <div class="case-carousel text-center text-light owl-carousel owl-theme">
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('assets-landing/img/galeri/1.jpg') }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a>Aktivitas Rutin Mingguan</a>
                        </div>
                        <h4>
                            <a>Kerja Bakti Asrama</a>
                        </h4>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('assets-landing/img/galeri/2.jpg') }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a>Aktivitas Rutin Bulanan</a>
                        </div>
                        <h4>
                            <a>Rapat Asrama</a>
                        </h4>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('assets-landing/img/galeri/3.jpg') }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a>Momentum Spesial</a>
                        </div>
                        <h4>
                            <a>HUT Asrama KPMB Makassar</a>
                        </h4>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="{{ asset('assets-landing/img/galeri/1.jpg') }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a>Aktivitas Rutin Mingguan</a>
                        </div>
                        <h4>
                            <a>Kerja Bakti Asrama</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Galeri Area -->

    <!--Testimonial Sistem -->
    <div class="testimonials-area carousel-shadow default-padding">
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Testimoni Pengguna</h5>
                        <h2>
                            Apa Kata Pengguna Mabiro?
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonials-carousel owl-carousel owl-theme">

                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets-landing/img/teams/foto-testimoni-01.jpg') }}" alt="Thumb">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="info">
                                <p class="mb-testimoni">
                                    Tampilan, warna, serta logo yang sederhana namun elegan memberikan kesan profesional.
                                    Peletakan fitur-fiturnya pun dirancang dengan baik, sehingga memudahkan pengguna saat
                                    mengakses. Dilengkapi dengan mode malam yang semakin mendukung kenyamanan pengguna.
                                </p>
                                <div class="bottom">
                                    <div class="provider">
                                        <h5>Dhiyani Fadilatul Iffah </h5>
                                        <span>Ketua KPMB Makassar</span>
                                    </div>
                                    <div class="raging">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets-landing/img/teams/foto-testimoni-02.jpg') }}" alt="Thumb">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div cla.ss="info ">
                                <p class="mb-testimoni">
                                    Sistem ini menjadikan pengelolaan administrasi diasrama lebih teratur dan mudah diakses.
                                    karena sebelumnya kami menggunakan sistem manual sehingga ketika ingin mengakses
                                    arsip-arsip dokumen cenderung lebih sulit dan agak memakan waktu.
                                </p>
                                <div class="bottom">
                                    <div class="provider">
                                        <h5>Dewi Hardiani</h5>
                                        <span>Kepala Biro Asrama</span>
                                    </div>
                                    <div class="raging">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="item">
                            <div class="thumb thumb text-center text-lg-start">
                                <img src="{{ asset('assets-landing/img/teams/foto-testimoni-03.jpg') }}" alt="Thumb">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="info">
                                <p class="mb-testimoni">
                                    Saya bisa menyampaikan keluhan langsung dari aplikasi dan memantau statusnya. Komunikasi
                                    dengan pengelola jadi lebih lancar.
                                </p>
                                <div class="bottom">
                                    <div class="provider">
                                        <h5>Andi M. Murfid Muqsith</h5>
                                        <span>Warga Asrama</span>
                                    </div>
                                    <div class="raging">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Sistem -->

    <!-- Star FAQ -->
    <div class="faq-area overflow-hidden bg-gray rectangular-shape default-padding">
        <div class="container">
            <div class="faq-items">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="thumb wow fadeInLeft" data-wow-delay="0.5s">
                            <img class="mb-gambar-darkmode"
                                src="{{ asset('assets-landing/img/illustration/ilustrasi-4.png') }}" alt="Thumb">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="faq-content">
                            <h5>faq</h5>
                            <h2 class="area-title">Pertanyaan yang Sering Diajukan</h2>
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item accordion-style-one">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Siapa saja yang bisa menggunakan sistem ini ?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p>
                                                Sistem ini dapat diakses secara publik, namun ada beberapa layanan halaman
                                                yang hanya dapat diakses oleh pengelola dan penghuni sesuai hak aksesnya
                                                masing-masing.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item accordion-style-one">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Apakah penghuni bisa mengajukan keluhan langsung dari sistem?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p>
                                                Ya, penghuni bisa menyampaikan keluhan atau laporan langsung lewat fitur
                                                khusus di sistem, jadi tidak perlu lagi datang langsung atau lewat chat
                                                pribadi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item accordion-style-one">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Apakah sistem ini bisa diakses dari HP?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p>
                                                Tentu bisa. Sistem ini dirancang dengan tampilan yang responsif dengan basis
                                                website PWA dan bisa diakses lewat smartphone, tablet, maupun komputer, jadi
                                                lebih fleksibel digunakan kapan saja.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->


    <!-- Start Pricing Area
                                                                                                                                                                                                                                                        ============================================= -->
    {{-- <div id="pricing" class="pricing-area half-bg default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-light light text-center">
                        <h2 class="area-title">Our Packages</h2>
                        <div class="devider"></div>
                        <p>
                            Outlived no dwelling denoting in peculiar as he believed. Behaviour excellent middleton be as it
                            curiosity departure ourselves very extreme.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Pricing Area -->




    <!-- Start Contact Area
                                                                                                                                                                                                                                                                                                                                                                                                                                                    ============================================= -->
    {{-- <div class="contact-area bg-gray half-bg default-padding-bottom">
        <div class="container">
            <div class="contact-box">
                <div class="row">
                    <div class="col-lg-5 left-info">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="info">
                                <h5>Office Location</h5>
                                <p>
                                    22 Baker Street, London, <br>United Kingdom, W1U 3BW
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info">
                                <h5>Phone</h5>
                                <p>
                                    +44-20-7328-4499 <br>+99-34-8878-9989
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope-open"></i>
                            </div>
                            <div class="info">
                                <h5>Email</h5>
                                <p>
                                    info@yourdomain.com <br>admin@yourdomain.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="content">
                            <div class="heading">
                                <h2>Need Help?</h2>
                                <p>Reach out to the world’s most reliable IT services.</p>
                            </div>
                            <form action="assets/mail/contact.php" method="POST" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" placeholder="Name"
                                                type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="email" name="email"
                                                placeholder="Email*" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="phone" name="phone"
                                                placeholder="Phone" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="comments" name="comments" placeholder="Please describe what you need."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" id="submit">
                                            Get a free consultation
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-md-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Contact Area -->

    <!-- Start Blog Area
                                                                                                                                                                                                                                                                                                                                                                                                                                                    ============================================= -->
    {{-- <div class="blog-area default-padding-bottom bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5>Our Blog</h5>
                        <h2 class="area-title">Latest News & Articles <br> Directly from Blog</h2>
                        <div class="devider"></div>
                        <p>
                            Outlived no dwelling denoting in peculiar as he believed. Behaviour excellent middleton be as it
                            curiosity departure ourselves very extreme.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <!-- Single Item -->
                    <div class="single-item col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets-landing/img/blog/1.jpg') }}" alt="Thumb">
                                <div class="date">12 <span>Jan, 2025</span></div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li><a><i class="fas fa-user"></i> Mark John</a></li>
                                        <li><a><i class="fas fa-comments"></i> 15 Comments</a></li>
                                    </ul>
                                </div>
                                <h4>
                                    <a href="blog-single-with-sidebar.html">Discovery incommode earnestly commanded</a>
                                </h4>
                                <p>
                                    Easy mind life fact with see has bore ten. Parish any chatty can elinor direct for
                                    former. Up as meant widow.
                                </p>
                                <a class="btn-more" href="blog-single-with-sidebar.html">Read More <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets-landing/img/blog/2.jpg') }}" alt="Thumb">
                                <div class="date">05 <span>Feb, 2025</span></div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li><a><i class="fas fa-user"></i> Diba Nual</a></li>
                                        <li><a><i class="fas fa-comments"></i> 27 Comments</a></li>
                                    </ul>
                                </div>
                                <h4>
                                    <a href="blog-single-with-sidebar.html">Village did removed enjoyed explain nor ham</a>
                                </h4>
                                <p>
                                    Easy mind life fact with see has bore ten. Parish any chatty can elinor direct for
                                    former. Up as meant widow.
                                </p>
                                <a class="btn-more" href="blog-single-with-sidebar.html">Read More <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets-landing/img/blog/3.jpg') }}" alt="Thumb">
                                <div class="date">18 <span>Mar, 2025</span></div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li><a><i class="fas fa-user"></i> Paul Jon</a></li>
                                        <li><a><i class="fas fa-comments"></i> 18 Comments</a></li>
                                    </ul>
                                </div>
                                <h4>
                                    <a href="blog-single-with-sidebar.html">My little garret repair to desire he esteem.
                                    </a>
                                </h4>
                                <p>
                                    Easy mind life fact with see has bore ten. Parish any chatty can elinor direct for
                                    former. Up as meant widow.
                                </p>
                                <a class="btn-more" href="blog-single-with-sidebar.html">Read More <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Blog Area Area -->
@endsection
