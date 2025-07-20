<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataInventarisRequest;
use App\Http\Requests\UpdateDataInventarisRequest;
use App\Models\DataInventaris;

class DataInventarisController extends BaseController
{
    public function index()
    {
        $module = 'Data Inventaris';
        return view('biro.inventaris.index', compact('module'));
    }

    public function get()
    {
        $data = DataInventaris::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreDataInventarisRequest $store)
    {
        try {
            $data = new DataInventaris();
            $data->no_inventaris = $store->no_inventaris;
            $data->nama_barang = $store->nama_barang;
            $data->jumlah = $store->jumlah;
            $data->satuan = $store->satuan;
            $data->baik = $store->baik;
            $data->kurang_baik = $store->kurang_baik;
            $data->rusak = $store->rusak;
            $data->keterangan = $store->keterangan;
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
            $data = DataInventaris::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreDataInventarisRequest $update, $params)
    {
        $data = DataInventaris::where('uuid', $params)->first();

        try {
            $data->no_inventaris = $update->no_inventaris;
            $data->nama_barang = $update->nama_barang;
            $data->jumlah = $update->jumlah;
            $data->satuan = $update->satuan;
            $data->baik = $update->baik;
            $data->kurang_baik = $update->kurang_baik;
            $data->rusak = $update->rusak;
            $data->keterangan = $update->keterangan;
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
            $data = DataInventaris::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    // user
    public function inventaris()
    {
        $module = 'Daftar Inventaris';
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Maaf anda harus login sebagai warga asrama untuk mengakses halaman ini.');
        }
        $data = DataInventaris::latest()->get();
        return view('user.inventaris', compact('module', 'data'));
    }
}
