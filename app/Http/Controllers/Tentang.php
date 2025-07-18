<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Program;
use App\Models\SelayangPandang;
use App\Models\User;
use Illuminate\Http\Request;

class Tentang extends BaseController
{
    public function selayang_pandang()
    {
        $module = 'Selayang Pandang';
        $data = SelayangPandang::first();
        return view('user.selayangpandang', compact('module', 'data'));
    }

    public function pengelola()
    {
        $module = 'Pengelola Asrama';
        $pengelola = User::where('role', '!=', 'penghuni')->get();
        return view('user.pengelola', compact('module', 'pengelola'));
    }

    public function program()
    {
        $module = 'Program';
        $data = Program::latest()->get();
        return view('user.program', compact('module', 'data'));
    }

    public function fasilitas()
    {
        $module = 'Gedung & Fasilitas';
        $data = Fasilitas::latest()->get();
        return view('user.fasilitas', compact('module', 'data'));
    }
}
