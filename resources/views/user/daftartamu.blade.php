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
                    style="background: #fff; border-collapse: separate; border-spacing: 0; border: 1px solid #dee2e6;">

                    <!-- HEADER -->
                    <thead style="color: #fff; font-weight: 700;">
                        <tr>
                            <th
                                style="max-width: 100px; vertical-align: middle; border-right: 1px solid rgba(255,255,255,0.3);">
                                Status</th>
                            <th
                                style="max-width: 300px; vertical-align: middle; border-right: 1px solid rgba(255,255,255,0.3);">
                                Nama Tamu</th>
                            <th
                                style="padding: 0.8rem; vertical-align: middle; border-right: 1px solid rgba(255,255,255,0.3);">
                                Tujuan Bertamu</th>
                            <th
                                style="max-width: 180px; vertical-align: middle; border-right: 1px solid rgba(255,255,255,0.3);">
                                Tanggal Masuk</th>
                            <th style="max-width: 180px; vertical-align: middle;">Tanggal Keluar</th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody>
                        @forelse ($data as $item)
                            <tr style="border-bottom: 1px solid #f1f1f1; transition: background 0.2s;">
                                <!-- Status -->
                                <td style="border-right: 1px solid #e9ecef;">
                                    @if ($item->status === 'Sedang Bertamu')
                                        <i class="fas fa-circle" style="color: #28a745; font-size: 0.8rem;"></i>
                                    @else
                                        <i class="fas fa-circle" style="color: #dc3545; font-size: 0.8rem;"></i>
                                    @endif
                                </td>

                                <!-- Nama -->
                                <td class="text-start"
                                    style="padding: 0.9rem; font-weight: 500; border-right: 1px solid #e9ecef;">
                                    {{ $item->nama_tamu }}
                                </td>

                                <!-- Tujuan -->
                                <td class="text-start" style="padding: 0.9rem; border-right: 1px solid #e9ecef;">
                                    {{ $item->tujuan }}
                                </td>

                                <!-- Masuk -->
                                <td style="padding: 0.9rem; color: #198754; border-right: 1px solid #e9ecef;">
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
