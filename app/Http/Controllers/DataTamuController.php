<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataTamuRequest;
use App\Http\Requests\UpdateDataTamuRequest;
use App\Models\DataTamu;
use Illuminate\Support\Facades\File;


class DataTamuController extends BaseController
{
    public function index()
    {
        $module = 'Data Tamu';
        return view('biro.datatamu.index', compact('module'));
    }

    public function get()
    {


        // $data = DataTamu::all(); //Urutkan Dafault
        // $data = DataTamu::orderByRaw("STR_TO_DATE(tanggal_masuk, '%d-%m-%Y') DESC")->get(); //Urutkan Berdasarkan Tahun-Bulan-Tanggal

        $data = DataTamu::orderBy('created_at', 'desc')->get(); //Urutkan Berdasarkan Data Dibuat
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreDataTamuRequest $store)
    {

        $newIdentitas = '';
        if ($store->file('identitas')) {
            $extension = $store->file('identitas')->extension();
            $newIdentitas = 'identitas' . '-' . now()->timestamp . '.' . $extension;
            $store->file('identitas')->storeAs('public/tamu', $newIdentitas);
        }

        try {
            $data = new DataTamu();
            $data->nama_tamu = $store->nama_tamu;
            $data->alamat = $store->alamat;
            $data->no_handphone = $store->no_handphone;
            $data->tujuan = $store->tujuan;
            $data->kerabat = $store->kerabat;
            $data->tanggal_masuk = $store->tanggal_masuk;
            $data->tanggal_keluar = $store->tanggal_keluar;
            $data->identitas = $newIdentitas;
            $data->status = 'Sedang Bertamu';
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
            $data = DataTamu::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }



    public function update(StoreDataTamuRequest $update, $params)
    {
        $data = DataTamu::where('uuid', $params)->firstOrFail();

        // Simpan nama file lama
        $oldIdentitas = $data->identitas;
        $newIdentitas = $oldIdentitas; // default gunakan lama

        // Kalau user upload file baru
        if ($update->hasFile('identitas')) {
            $extension = $update->file('identitas')->extension();
            $newIdentitas = 'identitas-' . now()->timestamp . '.' . $extension;

            // Simpan file baru ke storage/app/public/tamu
            $update->file('identitas')->storeAs('public/tamu', $newIdentitas);

            // Hapus file lama kalau ada
            $oldPath = storage_path('app/public/tamu/' . $oldIdentitas);
            if ($oldIdentitas && File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        try {
            $data->update([
                'nama_tamu' => $update->nama_tamu,
                'alamat' => $update->alamat,
                'no_handphone' => $update->no_handphone,
                'tujuan' => $update->tujuan,
                'kerabat' => $update->kerabat,
                'tanggal_masuk' => $update->tanggal_masuk,
                'tanggal_keluar' => $update->tanggal_keluar,
                'identitas' => $newIdentitas,
                'status' => $update->status,
            ]);

            return $this->sendResponse($data, 'Update data success');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
    }



    public function delete($params)
    {
        $data = array();
        try {
            $data = DataTamu::where('uuid', $params)->first();
            // Simpan nama gambar lama untuk dihapus
            $oldIdentitasPath = public_path('/public/tamu/' . $data->identitas);
            // Hapus gambar lama jika ada
            if (File::exists($oldIdentitasPath)) {
                File::delete($oldIdentitasPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    // user
    public function buku_tamu()
    {
        $module = 'Buku Tamu';
        return view('user.bukutamu', compact('module'));
    }

    public function daftar_tamu()
    {
        $module = 'Daftar Tamu';
        // if (!auth()->check() || auth()->user()->role !== 'penghuni') {
        //     return redirect()->route('login.login-akun');
        // }
        $data = DataTamu::latest()->get();
        return view('user.daftartamu', compact('module', 'data'));
    }
}


