<?php

namespace App\Http\Controllers;

use App\Models\DataPenghuni;
use App\Models\User;
use Illuminate\Http\Request;

class Profile extends BaseController
{
    public function index()
    {
        $module = 'Profile';
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Maaf anda harus login sebagai warga asrama untuk mengakses halaman ini.');
        }
        $data = User::where('uuid', auth()->user()->uuid)->first();
        $data->data_penghuni = DataPenghuni::where('uuid_user', $data->uuid)->first();
        return view('user.profile', compact('module', 'data'));
    }
}
