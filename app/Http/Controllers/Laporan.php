<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class Laporan extends BaseController
{
    public function index()
    {
        $module = 'Laporan';
        return view('biro.laporan.index', compact('module'));
    }

    public function get($params)
    {
        // Pisahkan dan validasi tanggal
        $dateParts = explode(' to ', $params);
        $startDateStr = $dateParts[0];
        $endDateStr = $dateParts[1];

        $pemasukan = Pemasukan::whereBetween('tanggal', [$startDateStr, $endDateStr])
            ->get()
            ->map(function ($item) {
                $item->tipe = 'pemasukan';
                return $item;
            });

        $pengeluaran = Pengeluaran::whereBetween('tanggal', [$startDateStr, $endDateStr])
            ->get()
            ->map(function ($item) {
                $item->tipe = 'pengeluaran';
                return $item;
            });


        $merged = collect()
            ->merge($pemasukan)
            ->merge($pengeluaran)
            ->sortBy('tanggal')
            ->values();

        return $this->sendResponse($merged, 'Get data success');
    }

    public function export_to_excel($params)
    {
        // 1. Pisahkan & validasi tanggal
        [$startDateStr, $endDateStr] = explode(' to ', $params);

        // 2. Ambil data pemasukan dan pengeluaran
        $pemasukan = Pemasukan::whereBetween('tanggal', [$startDateStr, $endDateStr])
            ->get()
            ->map(function ($item) {
                $item->tipe = 'pemasukan';
                return $item;
            });

        $pengeluaran = Pengeluaran::whereBetween('tanggal', [$startDateStr, $endDateStr])
            ->get()
            ->map(function ($item) {
                $item->tipe = 'pengeluaran';
                return $item;
            });

        $merged = collect()
            ->merge($pemasukan)
            ->merge($pengeluaran)
            ->sortBy('tanggal')
            ->values();

        // 3. Inisialisasi Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_FOLIO);
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');

        // 4. Logo
        $logoPath = public_path('/logo-kpmb.png');
        if (file_exists($logoPath)) {
            $logo = new Drawing();
            $logo->setName('Logo');
            $logo->setPath($logoPath);
            $logo->setCoordinates('A1');
            $logo->setHeight(60);
            $logo->setOffsetX(5);
            $logo->setWorksheet($sheet);
        }

        // 5. Judul dan Periode (merge ke seluruh kolom A-E)
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A1', 'LAPORAN KEUANGAN BIRO ASRAMA KPMB MAKASSAR');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        $sheet->mergeCells('A2:E2');
        $sheet->setCellValue('A2', 'PER ' . $startDateStr . ' Sampai ' . $endDateStr);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');

        // 6. Header tabel
        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'TANGGAL');
        $sheet->setCellValue('C5', 'KETERANGAN');
        $sheet->setCellValue('D5', 'DEBET');
        $sheet->setCellValue('E5', 'KREDIT');
        $sheet->getStyle('A5:E5')->getFont()->setBold(true);

        // 7. Tabel isi
        $row = 6;
        $pemasukanTotal = 0;
        $pengeluaranTotal = 0;

        foreach ($merged as $index => $rekap) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $rekap->tanggal);
            $sheet->setCellValue('C' . $row, $rekap->keterangan);
            $sheet->setCellValue('D' . $row, $rekap->tipe === 'pemasukan' ? "Rp " . number_format($rekap->jumlah, 0, ',', '.') : '-');
            $sheet->setCellValue('E' . $row, $rekap->tipe === 'pengeluaran' ? "Rp " . number_format($rekap->jumlah, 0, ',', '.') : '-');

            if ($rekap->tipe === 'pemasukan') {
                $pemasukanTotal += $rekap->jumlah;
            } else {
                $pengeluaranTotal += $rekap->jumlah;
            }

            $row++;
        }

        // 8. Baris total pemasukan & pengeluaran
        $sheet->setCellValue('A' . $row, 'Total');
        $sheet->mergeCells("A{$row}:C{$row}");
        $sheet->setCellValue('D' . $row, "Rp " . number_format($pemasukanTotal, 0, ',', '.'));
        $sheet->setCellValue('E' . $row, "Rp " . number_format($pengeluaranTotal, 0, ',', '.'));
        $sheet->getStyle("A{$row}:E{$row}")->getFont()->setBold(true);
        $row++;

        // 9. Total saldo
        $sisaSaldo = $pemasukanTotal - $pengeluaranTotal;
        $sheet->setCellValue('A' . $row, 'Total Saldo');
        $sheet->mergeCells("A{$row}:D{$row}");
        $sheet->setCellValue('E' . $row, "Rp " . number_format($sisaSaldo, 0, ',', '.'));

        $sheet->getStyle("A{$row}:E{$row}")->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'acb9ca'],
            ],
            'borders' => [
                'outline' => ['borderStyle' => Border::BORDER_THIN],
            ],
            'font' => [
                'bold' => true,
            ],
        ]);

        // 10. Auto-size kolom
        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // 11. Gaya tabel
        $sheet->getStyle("A5:E{$row}")->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // 12. Output file
        $filename = 'laporan_keuangan_' . now()->format('Ymd_His') . '.xlsx';
        $filepath = public_path($filename);
        $writer = new Xlsx($spreadsheet);
        $writer->save($filepath);

        return response()->download($filepath)->deleteFileAfterSend(true);
    }

    // user
    public function rekap()
    {
        $module = 'Rekapitulasi Keuangan';
        if (!auth()->check() || auth()->user()->role !== 'penghuni') {
            return redirect()->route('login.login-akun');
        }
        return view('user.rekap', compact('module'));
    }
}
