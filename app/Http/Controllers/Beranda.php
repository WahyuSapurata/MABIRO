<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beranda extends BaseController
{
    public function index()
    {
        $module = 'Beranda';
        return view('user.beranda', compact('module'));
    }
}
