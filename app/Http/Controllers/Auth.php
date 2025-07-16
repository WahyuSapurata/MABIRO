<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth as RequestsAuth;
use App\Http\Requests\RegisterPenghuni;
use App\Models\DataPenghuni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class Auth extends BaseController
{
    public function show()
    {
        return view('auth.login');
    }

    public function login_proses(RequestsAuth $authRequest)
    {
        $credential = $authRequest->getCredentials();

        if (!FacadesAuth::attempt($credential)) {
            return redirect()->route('login.login-akun')->with('failed', 'Username atau Password salah')->withInput($authRequest->only('username'));
        } else {
            return $this->authenticated();
        }
    }

    public function authenticated()
    {
        if (auth()->user()->role === 'biro') {
            return redirect()->route('biro.dashboard-biro');
        } else if (auth()->user()->role === 'keuangan') {
            return redirect()->route('keuangan.dashboard-keuangan');
        } else  if (auth()->user()->role === 'inventaris') {
            return redirect()->route('inventaris.dashboard-inventaris');
        }
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login.login-akun')->with('success', 'Berhasil Logout');
    }

    public function register()
    {
        $module = 'Register Penghuni';
        return view('auth.register', compact('module'));
    }

    public function store(RegisterPenghuni $store)
    {
        $newFoto = '';
        if ($store->file('foto')) {
            $extension = $store->file('foto')->extension();
            $newFoto = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $store->file('foto')->storeAs('public/penghuni', $newFoto);
        }

        try {
            $user = new User();
            $user->nama = $store->nama;
            $user->username = $store->username;
            $user->password_hash = $store->password_hash;
            $user->password = Hash::make($store->password_hash);
            $user->role = 'penghuni';
            $user->foto = $newFoto;
            $user->save();

            $data = new DataPenghuni();
            $data->uuid_user = $user->uuid;
            $data->tempat_lahir = $store->tempat_lahir;
            $data->tanggal_lahir = $store->tanggal_lahir;
            $data->agama = $store->agama;
            $data->jenis_kelamin = $store->jenis_kelamin;
            $data->alamat = $store->alamat;
            $data->universitas = $store->universitas;
            $data->program_studi = $store->program_studi;
            $data->riwayat_pendidikan = $store->riwayat_pendidikan;
            $data->no_hp = $store->no_hp;
            $data->alasan = $store->alasan;
            $data->persetujuan = $store->persetujuan;
            $data->status = 'Belum Dikonfirmasi';
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add data success');
    }
}
