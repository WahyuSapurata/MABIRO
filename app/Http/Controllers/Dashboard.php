<?php

namespace App\Http\Controllers;

use App\Models\DataPeminjaman;
use App\Models\DataPenghuni;
use App\Models\DataTamu;
use App\Models\Event;
use App\Models\Pemasukan;
use App\Models\Penduduk;
use App\Models\Pengeluaran;
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
        $peminjaman = DataPeminjaman::where('status', 'proses')->count();

        $pemasukan = Pemasukan::sum('jumlah');
        $pengeluaran = Pengeluaran::sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        $tagihan = RekapPembayaran::where('status', 'proses')->count();
        return view('dashboard.biro', compact('module', 'calon_penghuni', 'penghuni', 'peminjaman', 'saldo', 'tagihan'));
    }

    public function dashboard_keuangan()
    {
        $module = 'Dashboard';
        return view('dashboard.keuangan', compact('module'));
    }

    public function dashboard_inventaris()
    {
        $module = 'Dashboard';
        return view('dashboard.inventaris', compact('module'));
    }
}
