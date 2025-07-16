<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemasukanRequest;
use App\Http\Requests\UpdatePemasukanRequest;
use App\Models\Pemasukan;

class PemasukanController extends BaseController
{
    public function index()
    {
        $module = 'Pemasukan';
        return view('biro.pemasukan.index', compact('module'));
    }

    public function get()
    {
        $data = Pemasukan::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StorePemasukanRequest $store)
    {
        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $store->jumlah);
        try {
            $data = new Pemasukan();
            $data->tanggal = $store->tanggal;
            $data->keterangan = $store->keterangan;
            $data->jumlah = $numericValue;
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
            $data = Pemasukan::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StorePemasukanRequest $update, $params)
    {
        $data = Pemasukan::where('uuid', $params)->first();

        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $update->jumlah);

        try {
            $data->tanggal = $update->tanggal;
            $data->keterangan = $update->keterangan;
            $data->jumlah = $numericValue;
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
            $data = Pemasukan::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
