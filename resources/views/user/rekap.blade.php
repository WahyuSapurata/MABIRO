@extends('user.layouts.layout')
@section('content')
    <!-- Start Breadcrumb
                                                                                                                                                                                                                                                                                                                                                                                ============================================= -->
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

    <div class="project-details-area default-padding">
        <div class="container">
            <div class="project-details-items">
                <div class="top-info">
                    <label class="form-label">Tanggal Priode</label>
                    <input type="text" id="tanggal" class="form-control kt_datepicker_7" name="tanggal"
                        placeholder="Pilih Tanggal">
                </div>

                <div class="main-content">
                    <div id="hasilPencarian" class="mt-4">
                        <div class="alert alert-info">Silahkan pilih priode tanggal terlebih dahulu.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        let control = new Control();

        $(".kt_datepicker_7").flatpickr({
            altInput: true,
            altFormat: "d-m-Y",
            dateFormat: "d-m-Y",
            mode: "range",
            onClose: function(selectedDates, dateStr, instance) {
                cariData(dateStr);
            }
        });

        function cariData(data) {
            if (!data) {
                Swal
                    .fire({
                        text: `Silahkan pilih tanggal priode terlebih dahulu`,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    })
                return;
            }

            $.ajax({
                url: '/rekap-get/' + data, // sesuaikan dengan endpoint-mu
                method: 'GET',
                success: function(response) {
                    if (response.data.length === 0) {
                        $('#hasilPencarian').html(
                            '<div class="alert alert-warning">Data rekapitulasi keuangan belum tersedia pada priode yang anda pilih.</div>'
                        );
                        return;
                    }

                    let rows = '';
                    let totalPemasukan = 0;
                    let totalPengeluaran = 0;
                    response.data.forEach((item, index) => {

                        const jumlah = parseInt(item.jumlah) || 0;

                        if (item.tipe === 'pemasukan') {
                            totalPemasukan += jumlah;
                        } else if (item.tipe === 'pengeluaran') {
                            totalPengeluaran += jumlah;
                        }

                        rows += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${item.tanggal}</td>
                                    <td>${item.keterangan}</td>
                                    <td>${item.tipe === 'pemasukan' ? 'Rp ' + numeral(item.jumlah).format('0,0') : '-'}</td>
                                    <td>${item.tipe === 'pengeluaran' ? 'Rp ' + numeral(item.jumlah).format('0,0') : '-'}</td>
                                </tr>
                            `;

                    });

                    $('#hasilPencarian').html(`
                        <h5 class="mb-2">Hasil Pencarian:</h5>
                        <table class="table table-striped table-sm text-left">
                            <thead class="thead-light text-uppercase text-xs">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${rows}
                            </tbody>
                            <tfoot id="tfoot" class="bg-mabiro rounded">
                                <tr class="fw-bolder fs-6 text-white">
                                    <td style="text-align: left !important;" colspan="3">Total</td>
                                    <td style="text-align: left !important; font-weight: bolder" colspan="1"
                                        id="total-pemasukan">
                                        Rp ${numeral(totalPemasukan).format('0,0')}
                                    </td>
                                    <td style="text-align: left !important; font-weight: bolder" colspan="1"
                                        id="total-pengeluaran">
                                        Rp ${numeral(totalPengeluaran).format('0,0')}
                                    </td>
                                </tr>
                                <tr class="fw-bolder fs-6 text-white">
                                    <td style="text-align: left !important;" colspan="3">Total Saldo</td>
                                    <td style="text-align: center !important; font-weight: bolder" colspan="2"
                                        id="total-saldo">
                                        Rp ${numeral(totalPemasukan - totalPengeluaran).format('0,0')}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    `);
                },
                error: function() {
                    $('#hasilPencarian').html(
                        '<div class="alert alert-danger">Terjadi kesalahan saat mengambil data.</div>');
                }
            });
        }
    </script>
@endsection
