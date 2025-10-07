@extends('user.layouts.layout')
@section('content')
    <!-- Start Breadcrumb
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ============================================= -->
    <div class="breadcrumb-area text-center shadow theme-hard bg-fixed text-light"
        style="background-image: url({{ asset('assets-landing/img/banner/asrama.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $module }} Asrama</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="project-details-area default-padding">
        <div class="container" style="padding: 2rem 0;">
            <div class="table-responsive"
                style="border-radius: 0.5rem; overflow-x: auto; box-shadow: 0 3px 12px rgba(0,0,0,0.08); background: #fff;">

                <table class="table table-bordered table-hover text-center align-middle mb-0"
                    style="min-width: 800px; background: #fff; border-collapse: separate; border-spacing: 0;">

                    <!-- HEADER -->
                    <thead
                        style="background: linear-gradient(90deg, #0d6efd, #1a73e8); color: #fff; font-weight: 700; text-transform: uppercase; font-size: 0.85rem;">
                        <tr>
                            <th style="padding: 0.8rem; vertical-align: middle;">No.</th>
                            <th style="padding: 0.8rem; vertical-align: middle;">Foto</th>
                            <th style="padding: 0.8rem; vertical-align: middle;">Nama</th>
                            <th style="padding: 0.8rem; vertical-align: middle;">Kerabat</th>
                            <th style="padding: 0.8rem; vertical-align: middle;">Tujuan</th>
                            <th style="padding: 0.8rem; vertical-align: middle;">Tanggal Keluar</th>
                            <th style="padding: 0.8rem; vertical-align: middle;"> Tanngal Keluar</th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody style="font-size: 0.95rem; color: #333;">
                        @forelse ($data as $item)
                            <tr style="border-bottom: 1px solid #f1f1f1; transition: background 0.2s;">
                                <!-- No -->
                                <td style="padding: 0.9rem;">{{ $loop->iteration }}</td>

                                <!-- Identitas (foto atau ikon) -->
                                <td style="padding: 0.9rem;">
                                    @if (!empty($item->identitas))
                                        <img src="{{ asset('/public/tamu/' . $item->identitas) }}" alt="Foto"
                                            style="width: 45px; height: 45px; border-radius: 50%;
                                                object-fit: cover; box-shadow: 0 0 0 2px #f1f1f1;">
                                    @else
                                        <div
                                            style="width: 45px; height: 45px; border-radius: 50%;
                                                background: #eef3ff; display: flex; align-items: center;
                                                justify-content: center; margin: auto;">
                                            <i class="fa fa-user text-primary" style="font-size: 1.3rem;"></i>
                                        </div>
                                    @endif
                                </td>

                                <!-- Nama -->
                                <td style="padding: 0.9rem; font-weight: 500;">{{ $item->nama_tamu }}</td>

                                <!-- Kerabat -->
                                <td style="padding: 0.9rem;">{{ $item->kerabat ?? '-' }}</td>

                                <!-- Tujuan -->
                                <td style="padding: 0.9rem;">{{ $item->tujuan }}</td>

                                <!-- Masuk -->
                                <td style="padding: 0.9rem; color: #198754;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}
                                </td>

                                <!-- Keluar -->
                                <td style="padding: 0.9rem; color: #dc3545;">
                                    {{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 2rem; text-align: center; color: #999;">
                                    <i class="fa fa-frown-o"
                                        style="font-size: 1.5rem; display: block; margin-bottom: 0.5rem;"></i>
                                    Data tidak tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    // Efek hover baris tabel
    document.querySelectorAll("tbody tr").forEach(row => {
        row.addEventListener("mouseenter", () => row.style.background = "#f8f9fa");
        row.addEventListener("mouseleave", () => row.style.background = "#fff");
    });
</script>
