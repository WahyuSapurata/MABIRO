<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataPenggunaRequest;
use App\Http\Requests\UpdateDataPenggunaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class DataPenggunaController extends BaseController
{
    public function index()
    {
        $module = 'Data Pengguna';
        return view('biro.datapengguna.index', compact('module'));
    }

    public function get()
    {
        $data = User::where('role', '!=', 'penghuni')->get();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreDataPenggunaRequest $store)
    {
        $newFoto = '';
        if ($store->file('foto')) {
            $extension = $store->file('foto')->extension();
            $newFoto = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $store->file('foto')->storeAs('public/pengguna', $newFoto);
        }

        try {
            $data = new User();
            $data->nama = $store->nama;
            $data->username = $store->username;
            $data->password_hash = $store->password_hash;
            $data->password = Hash::make($store->password_hash);
            $data->role = $store->role;
            $data->foto = $newFoto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add data success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = User::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateDataPenggunaRequest $update, $params)
    {
        $data = User::where('uuid', $params)->first();

        $oldFotoPath = public_path('/public/pengguna/' . $data->foto);

        $newFoto = '';
        if ($update->file('foto')) {
            $extension = $update->file('foto')->extension();
            $newFoto = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $update->file('foto')->storeAs('public/pengguna', $newFoto);

            // Hapus foto lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
        }

        try {
            $data->nama = $update->nama;
            $data->username = $update->username;
            $data->password_hash = $update->password_hash;
            $data->password = Hash::make($update->password_hash);
            $data->role = $update->role;
            $data->foto = $update->file('foto') ? $newFoto : $data->foto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update data success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = User::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFotoPath = public_path('/public/pengguna/' . $data->foto);
            // Hapus foto lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
