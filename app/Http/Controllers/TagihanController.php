<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagihanRequest;
use App\Http\Requests\UpdateTagihanRequest;
use App\Models\DataPenghuni;
use App\Models\MasterTagihan;
use App\Models\Tagihan;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class TagihanController extends BaseController
{
    public function index()
    {
        $module = 'Tagihan';
        $materTagihan = MasterTagihan::all();
        return view('biro.tagihan.index', compact('module', 'materTagihan'));
    }

    public function get()
    {
        $data = Tagihan::all();

        $data->map(function ($item) {
            $penghuni = DataPenghuni::where('uuid', $item->uuid_penghuni)->first();
            $user = User::where('uuid', $penghuni->uuid_user)->first();

            // Ambil array UUID master tagihan
            $uuids = $item->uuid_master_tagihan;

            // Ambil semua master tagihan
            $masterTagihan = MasterTagihan::whereIn('uuid', $uuids)->get();

            // Buat array nama_tagihan => jumlah dan hitung total listrik (selain Iuran)
            $tagihanArray = [];
            $totalListrik = 0;
            $total = 0;

            foreach ($masterTagihan as $tagihan) {
                $tagihanArray[$tagihan->nama] = $tagihan->jumlah;

                // Total semua tagihan
                $total += $tagihan->jumlah;

                // Total listrik: selain tagihan bernama 'Iuran'
                if (strtolower($tagihan->nama) !== 'iuran') {
                    $totalListrik += $tagihan->jumlah;
                }
            }

            $item->nama_penghuni = $user->nama ?? '-';
            $item->tagihan = $tagihanArray;
            $item->total = $total;
            $item->total_listrik = $totalListrik;

            return $item;
        });

        return $this->sendResponse($data, 'Get data success');
    }


    public function store(Request $store)
    {
        try {
            $data = new Tagihan();
            $data->uuid_penghuni = $store->uuid_penghuni;
            $data->uuid_master_tagihan = $store->input('uuid_master_tagihan');
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
            $data = Tagihan::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(Request $update, $params)
    {
        $data = Tagihan::where('uuid', $params)->first();

        try {
            $data->uuid_penghuni = $update->uuid_penghuni;
            $data->uuid_master_tagihan = $update->input('uuid_master_tagihan');
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
            $data = Tagihan::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
