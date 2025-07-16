<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Penduduk;
use App\Models\SuratPengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login.login-akun');
    }

    public function dashboard_biro()
    {
        $module = 'Dashboard';
        return view('dashboard.biro', compact('module'));
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
