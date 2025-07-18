<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFasilitasRequest;
use App\Http\Requests\UpdateFasilitasRequest;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\File;

class FasilitasController extends BaseController
{
    public function index()
    {
        $module = 'Gedung & Fasilitas';
        return view('biro.fasilitas.index', compact('module'));
    }

    public function get()
    {
        $data = Fasilitas::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreFasilitasRequest $store)
    {
        $newGambar = '';
        if ($store->file('gambar')) {
            $extension = $store->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $store->file('gambar')->storeAs('public/fasilitas', $newGambar);
        }

        try {
            $data = new Fasilitas();
            $data->nama_fasilitas = $store->nama_fasilitas;
            $data->deskripsi = $store->deskripsi;
            $data->gambar = $newGambar;
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
            $data = Fasilitas::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateFasilitasRequest $update, $params)
    {
        $data = Fasilitas::where('uuid', $params)->first();

        $oldGambarPath = public_path('/public/fasilitas/' . $data->gambar);

        $newGambar = '';
        if ($update->file('gambar')) {
            $extension = $update->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $update->file('gambar')->storeAs('public/fasilitas', $newGambar);

            // Hapus gambar lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
        }

        try {
            $data->nama_fasilitas = $update->nama_fasilitas;
            $data->deskripsi = $update->deskripsi;
            $data->gambar = $update->file('gambar') ? $newGambar : $data->gambar;
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
            $data = Fasilitas::where('uuid', $params)->first();
            // Simpan nama gambar lama untuk dihapus
            $oldGambarPath = public_path('/public/fasilitas/' . $data->gambar);
            // Hapus gambar lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
