<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArsipDokumenRequest;
use App\Http\Requests\UpdateArsipDokumenRequest;
use App\Models\ArsipDokumen;
use Illuminate\Support\Facades\File;

class ArsipDokumenController extends BaseController
{
    public function index()
    {
        $module = 'Arsip Dokumen';
        return view('biro.arsip.index', compact('module'));
    }

    public function get()
    {
        $data = ArsipDokumen::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreArsipDokumenRequest $store)
    {
        $newFile = '';
        if ($store->file('nama_file')) {
            $extension = $store->file('nama_file')->extension();
            $newFile = 'nama_file' . '-' . now()->timestamp . '.' . $extension;
            $store->file('nama_file')->storeAs('public/arsip', $newFile);
        }

        try {
            $data = new ArsipDokumen();
            $data->keterangan = $store->keterangan;
            $data->nama_file = $newFile;
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
            $data = ArsipDokumen::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateArsipDokumenRequest $update, $params)
    {
        $data = ArsipDokumen::where('uuid', $params)->first();

        $oldFilePath = public_path('/public/arsip/' . $data->nama_file);

        $newFile = '';
        if ($update->file('nama_file')) {
            $extension = $update->file('nama_file')->extension();
            $newFile = 'nama_file' . '-' . now()->timestamp . '.' . $extension;
            $update->file('nama_file')->storeAs('public/arsip', $newFile);

            // Hapus nama_file lama jika ada
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        try {
            $data->keterangan = $update->keterangan;
            $data->nama_file = $update->file('nama_file') ? $newFile : $data->nama_file;
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
            $data = ArsipDokumen::where('uuid', $params)->first();
            // Simpan nama nama_file lama untuk dihapus
            $oldFilePath = public_path('/public/arsip/' . $data->nama_file);
            // Hapus nama_file lama jika ada
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    // user
    public function arsip()
    {
        $module = 'Arsip & Dokumen';
        if (auth()->check()) {
            return redirect()->back()->with('error', 'Maaf anda harus login sebagai warga asrama untuk mengakses halaman ini.');
        }
        $data = ArsipDokumen::latest()->get();
        return view('user.arsip', compact('module', 'data'));
    }
}
