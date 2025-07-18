<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSelayangPandangRequest;
use App\Http\Requests\UpdateSelayangPandangRequest;
use App\Models\SelayangPandang;
use Illuminate\Support\Facades\File;

class SelayangPandangController extends BaseController
{
    public function index()
    {
        $module = 'Selayang Pandang';
        return view('biro.selayangpandang.index', compact('module'));
    }

    public function get()
    {
        $data = SelayangPandang::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreSelayangPandangRequest $store)
    {
        $newGambar = '';
        if ($store->file('gambar')) {
            $extension = $store->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $store->file('gambar')->storeAs('public/selayang-pandang', $newGambar);
        }

        try {
            $data = new SelayangPandang();
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
            $data = SelayangPandang::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateSelayangPandangRequest $update, $params)
    {
        $data = SelayangPandang::where('uuid', $params)->first();

        $oldGambarPath = public_path('/public/selayang-pandang/' . $data->gambar);

        $newGambar = '';
        if ($update->file('gambar')) {
            $extension = $update->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $update->file('gambar')->storeAs('public/selayang-pandang', $newGambar);

            // Hapus gambar lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
        }

        try {
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
            $data = SelayangPandang::where('uuid', $params)->first();
            // Simpan nama gambar lama untuk dihapus
            $oldGambarPath = public_path('/public/selayang-pandang/' . $data->gambar);
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
