<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use App\Models\Pengeluaran;

class PengeluaranController extends BaseController
{
    public function index()
    {
        $module = 'Pengeluaran';
        return view('biro.pengeluaran.index', compact('module'));
    }

    public function get()
    {
        $data = Pengeluaran::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StorePengeluaranRequest $store)
    {
        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $store->jumlah);
        try {
            $data = new Pengeluaran();
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
            $data = Pengeluaran::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StorePengeluaranRequest $update, $params)
    {
        $data = Pengeluaran::where('uuid', $params)->first();

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
            $data = Pengeluaran::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
