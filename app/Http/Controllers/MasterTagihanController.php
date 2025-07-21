<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasterTagihanRequest;
use App\Http\Requests\UpdateMasterTagihanRequest;
use App\Models\MasterTagihan;

class MasterTagihanController extends BaseController
{
    public function index()
    {
        $module = 'Master Tagihan';
        return view('biro.mastertagihan.index', compact('module'));
    }

    public function index_keuangan()
    {
        $module = 'Master Tagihan';
        return view('keuangan.mastertagihan.index', compact('module'));
    }

    public function get()
    {
        $data = MasterTagihan::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreMasterTagihanRequest $store)
    {
        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $store->jumlah);
        try {
            $data = new MasterTagihan();
            $data->nama = $store->nama;
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
            $data = MasterTagihan::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreMasterTagihanRequest $update, $params)
    {
        $data = MasterTagihan::where('uuid', $params)->first();

        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $update->jumlah);

        try {
            $data->nama = $update->nama;
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
            $data = MasterTagihan::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
