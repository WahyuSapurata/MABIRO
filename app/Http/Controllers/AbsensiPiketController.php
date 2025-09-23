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
            $data->tanggal = $store->tanggal;

            // $data->tanggal = Carbon::createFromFormat('d-m-Y', $store->tanggal)->format('Y-m-d');  // Konversi ke format DB standar 23-0-25

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
            $data->tanggal = $update->tanggal;
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

        // Cek login dan role
        if (!auth()->check() || auth()->user()->role !== 'penghuni') {
            return redirect()->route('login.login-akun');
        }

        // Ambil absensi hari ini langsung
        $today = Carbon::today()->toDateString();

        $data = AbsensiPiket::where('uuid_penghuni', auth()->user()->uuid)
            ->whereDate('tanggal', $today)
            ->first();

        // Ambil riwayat absensi yang ada dokumentasi
        $riwayat = AbsensiPiket::where('uuid_penghuni', auth()->user()->uuid)
            ->whereNotNull('dokumentasi_foto')
            ->get();

        return view('user.absensi', compact('module', 'data', 'riwayat'));
    }

    // public function absen() //Update 23-0-25
    // {
    //     $module = 'Absensi Piket';
    //     if (!auth()->check() || auth()->user()->role !== 'penghuni') {
    //         return redirect()->route('login.login-akun');
    //     }

    //     // Ambil SEMUA jadwal user, order by tanggal asc
    //     $allAbsensi = AbsensiPiket::where('uuid_penghuni', auth()->user()->uuid)
    //         ->orderBy('tanggal', 'asc')
    //         ->get();

    //     $data = null;       // Jadwal hari ini (untuk form absen)
    //     $upcoming = collect();  // Jadwal masa depan (baru ditambah admin, seperti 23 Sep)
    //     $riwayat = collect();   // Riwayat selesai (sudah piket + foto)

    //     foreach ($allAbsensi as $absensi) {
    //         $absenDate = Carbon::parse($absensi->tanggal);  // FIX: Gunakan parse() untuk auto-detect format DB (Y-m-d atau d-m-Y)

    //         if ($absenDate->isPast()) {  // Sudah lewat
    //             if ($absensi->status === 'Sudah Piket' && $absensi->dokumentasi_foto) {
    //                 $riwayat->push($absensi);
    //             }
    //         } elseif ($absenDate->isToday()) {
    //             $data = $absensi;  // Jadwal hari ini
    //         } else {  // Masa depan (belum waktunya)
    //             if ($absensi->status === 'Belum Piket') {
    //                 $upcoming->push($absensi);
    //             }
    //         }
    //     }

    //     // Sort riwayat terbaru dulu
    //     $riwayat = $riwayat->sortByDesc('tanggal');

    //     return view('user.absensi', compact(
    //         'module',
    //         'data',
    //         'riwayat',
    //         'upcoming'  // TAMBAHAN: Pass jadwal masa depan ke view
    //     ));
    // }

    //Batas Update


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
            $data->lokasi = $update->lokasi;
            $data->waktu = $update->waktu;
            $data->status = 'Sudah Piket';
            $data->dokumentasi_foto = $update->file('dokumentasi_foto') ? $newFoto : $data->dokumentasi_foto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update data success');
    }
}
