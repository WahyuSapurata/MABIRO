<?php

namespace App\Http\Controllers;

use App\Models\DataInventaris;
use App\Models\DataPeminjaman;
use App\Models\DataPenghuni;
use App\Models\DataTamu;
use App\Models\Event;
use App\Models\JadwalAgenda;
use App\Models\Keluhan;
use App\Models\Pemasukan;
use App\Models\Penduduk;
use App\Models\Pengeluaran;
use App\Models\Program;
use App\Models\RekapPembayaran;
use App\Models\SuratPengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login.login-akun');
    }

    public function dashboard_biro()
    {
        $module = 'Dashboard';
        $calon_penghuni = DataPenghuni::where('status', 'Belum Dikonfirmasi')->count();
        $penghuni = DataPenghuni::where('status', 'Terkonfirmasi')->count();
        $peminjaman = DataPeminjaman::where('status', 'Menunggu Persetujuan')->count();

        $pemasukan = Pemasukan::sum('jumlah');
        $pengeluaran = Pengeluaran::sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        $tagihan = RekapPembayaran::where('status', 'belum lunas')->count();

        $tamu = DataTamu::where('status', 'Sedang Bertamu')->count();
        $keluhan = Keluhan::where('status', 'Belum Ditindaklanjuti')->count();

        $agenda = JadwalAgenda::latest()->get();
        $agenda->map(function ($item) {
            $item->nama_program = Program::where('uuid', $item->uuid_program)->value('nama_program');
            return $item;
        });
        return view('dashboard.biro', compact('module', 'calon_penghuni', 'penghuni', 'peminjaman', 'saldo', 'tagihan', 'tamu', 'keluhan', 'agenda'));
    }

    public function dashboard_keuangan()
    {
        $module = 'Dashboard';
        $penghuni = DataPenghuni::where('status', 'Terkonfirmasi')->count();

        $pemasukan = Pemasukan::sum('jumlah');
        $pengeluaran = Pengeluaran::sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        $tagihan = RekapPembayaran::where('status', 'belum lunas')->count();

        $keluhan = Keluhan::where('status', 'Belum Ditindaklanjuti')->count();

        $pemasukan_bulan = Pemasukan::where('tanggal', now()->format('m'))->sum('jumlah');
        $pengeluaran_bulan = Pengeluaran::where('tanggal', now()->format('m'))->sum('jumlah');

        $agenda = JadwalAgenda::latest()->get();
        $agenda->map(function ($item) {
            $item->nama_program = Program::where('uuid', $item->uuid_program)->value('nama_program');
            return $item;
        });
        return view('dashboard.keuangan', compact('module', 'penghuni', 'saldo', 'tagihan', 'keluhan', 'agenda', 'pemasukan_bulan', 'pengeluaran_bulan'));
    }

    public function dashboard_inventaris()
    {
        $module = 'Dashboard';
        $penghuni = DataPenghuni::where('status', 'Terkonfirmasi')->count();
        $peminjaman = DataPeminjaman::where('status', 'Menunggu Persetujuan')->count();
        $peminjaman_belum_kembali = DataPeminjaman::where('status', 'Dipinjamkan')->count();

        $pemasukan = Pemasukan::sum('jumlah');
        $pengeluaran = Pengeluaran::sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        $keluhan = Keluhan::where('status', 'Belum Ditindaklanjuti')->count();

        $barang_rusak = DataInventaris::pluck('rusak')->count();
        $barang_kurang_baik = DataInventaris::pluck('kurang_baik')->count();
        $total_inventaris = DataInventaris::sum('jumlah');

        $agenda = JadwalAgenda::latest()->get();
        $agenda->map(function ($item) {
            $item->nama_program = Program::where('uuid', $item->uuid_program)->value('nama_program');
            return $item;
        });
        return view('dashboard.inventaris', compact('module', 'penghuni', 'peminjaman', 'peminjaman_belum_kembali', 'saldo', 'keluhan', 'agenda', 'barang_rusak', 'barang_kurang_baik', 'total_inventaris'));
    }
}
