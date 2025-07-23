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
        if (!auth()->check() || auth()->user()->role !== 'penghuni') {
            return redirect()->route('login.login-akun');
        }
        $data = User::where('uuid', auth()->user()->uuid)->first();
        $data->data_penghuni = DataPenghuni::where('uuid_user', $data->uuid)->first();
        return view('user.profile', compact('module', 'data'));
    }
}
