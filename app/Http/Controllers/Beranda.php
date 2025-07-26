<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beranda extends BaseController
{
    public function index()
    {
        // Jika user belum login, tampilkan beranda publik
        if (!auth()->check()) {
            $module = 'Beranda';
            return view('user.beranda', compact('module'));
        }

        // Jika user login dengan role biro, keuangan, atau inventaris, redirect
        if (in_array(auth()->user()->role, ['biro', 'keuangan', 'inventaris'])) {
            return redirect()->route('login.login-akun');
        }

        // Jika user login biasa, tampilkan beranda juga
        $module = 'Beranda';
        return view('user.beranda', compact('module'));
    }
}
