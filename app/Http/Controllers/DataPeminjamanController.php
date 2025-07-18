<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataPeminjamanRequest;
use App\Http\Requests\UpdateDataPeminjamanRequest;
use App\Models\DataPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataPeminjamanController extends BaseController
{
    public function index()
    {
        $module = 'Data Peminjaman';
        return view('biro.peminjaman.index', compact('module'));
    }

    public function get()
    {
        $data = DataPeminjaman::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreDataPeminjamanRequest $store)
    {
        $newSurat = '';
        if ($store->file('surat')) {
            $extension = $store->file('surat')->extension();
            $newSurat = 'surat' . '-' . now()->timestamp . '.' . $extension;
            $store->file('surat')->storeAs('public/peminjaman', $newSurat);
        }

        try {
            $data = new DataPeminjaman();
            $data->organisasi = $store->organisasi;
            $data->penanggung_jawab = $store->penanggung_jawab;
            $data->barang = $store->barang;
            $data->nomor_telepon = $store->nomor_telepon;
            $data->tanggal_pinjam = $store->tanggal_pinjam;
            $data->durasi_peminjaman = $store->durasi_peminjaman;
            $data->status = 'proses';
            $data->surat = $newSurat;
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
            $data = DataPeminjaman::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(Request $update, $params)
    {
        $data = DataPeminjaman::where('uuid', $params)->first();
        try {
            $data->status = $update->status;
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
            $data = DataPeminjaman::where('uuid', $params)->first();
            // Simpan nama surat lama untuk dihapus
            $oldSuratPath = public_path('/public/peminjaman/' . $data->surat);
            // Hapus surat lama jika ada
            if (File::exists($oldSuratPath)) {
                File::delete($oldSuratPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    // user
    public function peminjaman()
    {
        $module = 'Peminjaman';
        return view('user.peminjaman', compact('module'));
    }
}
