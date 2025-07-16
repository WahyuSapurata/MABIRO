<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRekapPembayaranRequest;
use App\Http\Requests\UpdateRekapPembayaranRequest;
use App\Models\DataPenghuni;
use App\Models\RekapPembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RekapPembayaranController extends BaseController
{
    public function index()
    {
        $module = 'Rekap Pembayaran';
        return view('biro.rekappembayaran.index', compact('module'));
    }

    public function get()
    {
        $data = RekapPembayaran::all();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_penghuni)->first();
            $item->nama_penghuni = $user ? $user->nama : 'Tidak Diketahui';
            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function buat_invoice()
    {
        $penghuni = DataPenghuni::where('status', 'Terkonfirmasi')->get();
        $bulan = date('n'); // bulan sekarang
        $tahun = date('Y');

        foreach ($penghuni as $user) {
            $cek = RekapPembayaran::where('uuid_penghuni', $user->uuid_user)
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->exists();

            if (!$cek) {
                RekapPembayaran::create([
                    'uuid_penghuni' => $user->uuid_user,
                    'status' => 'belum lunas',
                ]);
            } else {
                return $this->sendError('Invoice sudah dibuat untuk bulan ini', 'Invoice sudah dibuat untuk bulan ini', 400);
            }
        }
        return $this->sendResponse([], 'Invoice berhasil dibuat');
    }

    public function store(Request $store)
    {
        $newBukti = '';
        if ($store->file('bukti')) {
            $extension = $store->file('bukti')->extension();
            $newBukti = 'bukti' . '-' . now()->timestamp . '.' . $extension;
            $store->file('bukti')->storeAs('public/bukti', $newBukti);
        }

        try {
            $data = new RekapPembayaran();
            $data->uuid_penghuni = $store->uuid_penghuni;
            $data->metode_pembayaran = $store->metode_pembayaran;
            $data->status = 'proses';
            $data->bukti = $newBukti;
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
            $data = RekapPembayaran::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(Request $update, $params)
    {
        $data = RekapPembayaran::where('uuid', $params)->first();

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
            $data = RekapPembayaran::where('uuid', $params)->first();
            // Simpan nama bukti lama untuk dihapus
            $oldBuktiath = public_path('/public/bukti/' . $data->bukti);
            // Hapus bukti lama jika ada
            if (File::exists($oldBuktiath)) {
                File::delete($oldBuktiath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
