<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kontak extends BaseController
{
    public function index()
    {
        $module = 'Kontak Kami';
        return view('user.kontak', compact('module'));
    }
}
