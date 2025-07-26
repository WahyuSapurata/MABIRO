<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbsensiPiketRequest;
use App\Http\Requests\UpdateAbsensiPiketRequest;
use App\Models\AbsensiPiket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AbsensiPiketController extends BaseController
{
    public function index()
    {
        $module = 'Absensi Piket';
        return view('biro.absensi.index', compact('module'));
    }

    public function get()
    {
        $data = AbsensiPiket::all();
        $data->map(function ($item) {
            $item->nama_penghuni = User::where('uuid', $item->uuid_penghuni)->first()->nama ?? 'Tidak Diketahui';
            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreAbsensiPiketRequest $store)
    {
        try {
            $data = new AbsensiPiket();
            $data->uuid_penghuni = $store->uuid_penghuni;
            $data->lokasi = $store->lokasi;
            $data->waktu = $store->waktu;
            $data->status = 'Belum Piket';
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
            $data = AbsensiPiket::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreAbsensiPiketRequest $update, $params)
    {
        $data = AbsensiPiket::where('uuid', $params)->first();

        $newFoto = '';
        if ($update->file('dokumentasi_foto')) {
            $extension = $update->file('dokumentasi_foto')->extension();
            $newFoto = 'dokumentasi_foto' . '-' . now()->timestamp . '.' . $extension;
            $update->file('dokumentasi_foto')->storeAs('public/absen', $newFoto);
        }

        try {
            $data->uuid_penghuni = $update->uuid_penghuni;
            $data->lokasi = $update->lokasi;
            $data->waktu = $update->waktu;
            $data->dokumentasi_foto = $update->file('dokumentasi_foto') ? $newFoto : $data->dokumentasi_foto;
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
            $data = AbsensiPiket::where('uuid', $params)->first();
            $oldFotoPath = public_path('/public/absen/' . $data->dokumentasi_foto);
            // Hapus nama_file lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    // user
    public function absen()
    {
        $module = 'Absensi Piket';
        if (!auth()->check() || auth()->user()->role !== 'penghuni') {
            return redirect()->route('login.login-akun');
        }

        $absensi = AbsensiPiket::where('uuid_penghuni', auth()->user()->uuid)->first();
        $data = null;

        if ($absensi) {
            // Ambil tanggal absensi
            $absenDate = Carbon::createFromFormat('d-m-Y', $absensi->waktu);

            // Bandingkan dengan tanggal hari ini
            if ($absenDate->isSameDay(Carbon::today())) {
                $data = $absensi; // Tampilkan data jika tanggalnya sama dengan hari ini
            }
        }

        $riwayat = AbsensiPiket::where('uuid_penghuni', auth()->user()->uuid)->whereNotNull('dokumentasi_foto')->get();
        return view('user.absensi', compact(
            'module',
            'data',
            'riwayat'
        ));
    }

    public function upload_absen(Request $update, $params)
    {
        $data = AbsensiPiket::where('uuid', $params)->first();

        $newFoto = '';
        if ($update->file('dokumentasi_foto')) {
            $extension = $update->file('dokumentasi_foto')->extension();
            $newFoto = 'dokumentasi_foto' . '-' . now()->timestamp . '.' . $extension;
            $update->file('dokumentasi_foto')->storeAs('public/absen', $newFoto);
        }

        try {
            $data->status = 'Sudah Piket';
            $data->dokumentasi_foto = $update->file('dokumentasi_foto') ? $newFoto : $data->dokumentasi_foto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update data success');
    }
}
