<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRekapPembayaranRequest;
use App\Http\Requests\UpdateRekapPembayaranRequest;
use App\Models\DataPenghuni;
use App\Models\MasterTagihan;
use App\Models\RekapPembayaran;
use App\Models\Tagihan;
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

    public function index_keuangan()
    {
        $module = 'Rekap Pembayaran';
        return view('keuangan.rekappembayaran.index', compact('module'));
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

    public function store(Request $store, $params)
    {
        $data = RekapPembayaran::where('uuid', $params)->first();

        $newBukti = '';
        if ($store->file('bukti')) {
            $extension = $store->file('bukti')->extension();
            $newBukti = 'bukti' . '-' . now()->timestamp . '.' . $extension;
            $store->file('bukti')->storeAs('public/bukti', $newBukti);
        }

        try {
            $data->uuid_penghuni = auth()->user()->uuid;
            $data->metode_pembayaran = $store->metode_pembayaran;
            $data->status = 'proses';
            $data->bukti = $newBukti;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Pembayaran Berhasil Di Proses, Tunggu Konfirmasi Admin.');
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

    // user
    public function tagihan_user()
    {
        $module = 'Informasi Tagihan';
        if (!auth()->check() || auth()->user()->role !== 'penghuni') {
            return redirect()->route('login.login-akun');
        }
        $data = RekapPembayaran::where('uuid_penghuni', auth()->user()->uuid)->whereIn('status', ['belum lunas', 'proses', 'tolak'])->get();
        $data->map(function ($item) {
            $penghuni = DataPenghuni::where('uuid_user', auth()->user()->uuid)->first();
            $tagihan = Tagihan::where('uuid_penghuni', $penghuni->uuid)->first();
            // Ambil array UUID master tagihan
            $uuids = $tagihan->uuid_master_tagihan;

            // Ambil semua master tagihan
            $masterTagihan = MasterTagihan::whereIn('uuid', $uuids)->get();

            // Buat array nama_tagihan => jumlah dan hitung total listrik (selain Iuran)
            $total = 0;

            foreach ($masterTagihan as $tagihan) {
                // Total semua tagihan
                $total += $tagihan->jumlah;
            }

            $item->total_tagihan = $total;
            return $item;
        });
        $riwayat = RekapPembayaran::where('uuid_penghuni', auth()->user()->uuid)->where('status', 'sudah lunas')->get();
        $riwayat->map(function ($item) {
            $penghuni = DataPenghuni::where('uuid_user', auth()->user()->uuid)->first();
            $tagihan = Tagihan::where('uuid_penghuni', $penghuni->uuid)->first();
            // Ambil array UUID master tagihan
            $uuids = $tagihan->uuid_master_tagihan;

            // Ambil semua master tagihan
            $masterTagihan = MasterTagihan::whereIn('uuid', $uuids)->get();

            // Buat array nama_tagihan => jumlah dan hitung total listrik (selain Iuran)
            $total = 0;

            foreach ($masterTagihan as $tagihan) {
                // Total semua tagihan
                $total += $tagihan->jumlah;
            }

            $item->total_tagihan = $total;
            return $item;
        });
        return view('user.tagihan', compact('module', 'data', 'riwayat'));
    }
}
