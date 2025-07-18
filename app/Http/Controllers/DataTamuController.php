<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataTamuRequest;
use App\Http\Requests\UpdateDataTamuRequest;
use App\Models\DataTamu;

class DataTamuController extends BaseController
{
    public function index()
    {
        $module = 'Data Tamu';
        return view('biro.datatamu.index', compact('module'));
    }

    public function get()
    {
        $data = DataTamu::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreDataTamuRequest $store)
    {
        try {
            $data = new DataTamu();
            $data->nama_tamu = $store->nama_tamu;
            $data->alamat = $store->alamat;
            $data->tujuan = $store->tujuan;
            $data->tanggal_masuk = $store->tanggal_masuk;
            $data->tanggal_keluar = $store->tanggal_keluar;
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
        $data = DataTamu::where('uuid', $params)->first();

        try {
            $data->nama_tamu = $update->nama_tamu;
            $data->alamat = $update->alamat;
            $data->tujuan = $update->tujuan;
            $data->tanggal_masuk = $update->tanggal_masuk;
            $data->tanggal_keluar = $update->tanggal_keluar;
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
            $data = DataTamu::where('uuid', $params)->first();
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
}
