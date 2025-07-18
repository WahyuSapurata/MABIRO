@extends('user.layouts.layout')
@section('content')
    <!-- Start Breadcrumb   ============================================= -->
    <div class="breadcrumb-area text-center shadow theme-hard bg-fixed text-light"
        style="background-image: url({{ asset('assets-landing/img/banner/asrama.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $module }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star About Area
                                                                                            ============================================= -->
    <div class="about-area center-responsive default-padding">
        <div class="container">
            <div class="row align-center">
                <!-- Gambar -->
                <div class="col-lg-6">
                    <div class="thumb">
                        <img src="{{ $data ? asset('/public/selayang-pandang/' . $data->gambar) : asset('assets-landing/img/about/asrama.jpg') }}"
                            alt="Thumb" class="img-fluid" id="main-image">
                    </div>
                </div>

                <!-- Teks utama -->
                <div class="col-lg-6 info">
                    <h5>Selayang Pandang</h5>
                    <h2 class="area-title">Asram KPMB Makassar</h2>
                    <p id="teks-penuh">
                        {!! $data->deskripsi ? strip_tags($data->deskripsi) : 'Tidak ada deskripsi' !!}
                    </p>
                </div>

                <!-- Teks lanjutan otomatis di bawah -->
                <div class="col-12 mt-3">
                    <p id="teks-lanjutan"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const image = document.getElementById('main-image');
            const teksPenuh = document.getElementById('teks-penuh');
            const teksLanjutan = document.getElementById('teks-lanjutan');

            function potongTeks() {
                const imgHeight = image.offsetHeight;
                const originalText = teksPenuh.textContent.trim();
                const words = originalText.split(/\s+/);
                let tempText = '';
                teksPenuh.textContent = '';

                for (let i = 0; i < words.length; i++) {
                    teksPenuh.textContent += words[i] + ' ';
                    if (teksPenuh.offsetHeight > (imgHeight - 158)) {
                        // Jika sudah melebihi gambar
                        teksPenuh.textContent = tempText.trim(); // bagian atas
                        teksLanjutan.textContent = words.slice(i).join(' '); // sisa ke bawah
                        return;
                    }
                    tempText = teksPenuh.textContent;
                }
            }

            // Jalankan saat gambar siap
            if (image.complete) {
                potongTeks();
            } else {
                image.onload = potongTeks;
            }

            // Ulangi saat resize
            window.addEventListener('resize', () => {
                const fullText = teksPenuh.textContent + ' ' + teksLanjutan.textContent;
                teksPenuh.textContent = fullText.trim();
                teksLanjutan.textContent = '';
                potongTeks();
            });
        });
    </script>
@endsection
