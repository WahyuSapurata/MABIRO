<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeluhanRequest;
use App\Http\Requests\UpdateKeluhanRequest;
use App\Models\Keluhan;
use App\Models\User;
use Illuminate\Http\Request;

class KeluhanController extends BaseController
{
    public function index()
    {
        $module = 'Laoran & Keluhan';
        return view('biro.keluhan.index', compact('module'));
    }

    public function get()
    {
        $data = Keluhan::all();
        $data->map(function ($item) {
            $item->nama_penghuni = User::where('uuid', $item->uuid_penghuni)->first()->nama ?? 'Tidak Diketahui';
            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreKeluhanRequest $store)
    {
        try {
            $data = new Keluhan();
            $data->uuid_penghuni = $store->uuid_penghuni;
            $data->keterangan = $store->keterangan;
            $data->ketegori = $store->ketegori;
            $data->status = 'Belum Ditindaklanjuti';
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
            $data = Keluhan::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(Request $update, $params)
    {
        $data = Keluhan::where('uuid', $params)->first();

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
            $data = Keluhan::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    // user
    public function keluhan()
    {
        $module = 'Laporan & Keluhan';
        $data = auth()->user();
        if (!auth()->check() || auth()->user()->role !== 'penghuni') {
            return redirect()->route('login.login-akun');
        }
        return view('user.keluhan', compact('module', 'data'));
    }
}
