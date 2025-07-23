<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataPenghuniRequest;
use App\Http\Requests\UpdateDataPenghuniRequest;
use App\Models\DataPenghuni;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DataPenghuniController extends BaseController
{
    public function index()
    {
        $module = 'Data Penghuni';
        return view('biro.datapenghuni.index', compact('module'));
    }

    public function get()
    {
        $data = DataPenghuni::all();
        $data->map(function ($item) {
            $user = User::where('uuid', $item->uuid_user)->first();
            $item->nama = $user->nama;
            $item->username = $user->username;
            $item->password = $user->password_hash;
            $item->foto = $user->foto;
            // Tambahkan data user lainnya jika diperlukan
            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreDataPenghuniRequest $store)
    {
        $newFoto = '';
        if ($store->file('foto')) {
            $extension = $store->file('foto')->extension();
            $newFoto = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $store->file('foto')->storeAs('public/penghuni', $newFoto);
        }

        try {
            $user = new User();
            $user->nama = $store->nama;
            $user->username = $store->username;
            $user->password_hash = $store->password_hash;
            $user->password = Hash::make($store->password_hash);
            $user->role = 'penghuni';
            $user->foto = $newFoto;
            $user->save();

            $data = new DataPenghuni();
            $data->uuid_user = $user->uuid;
            $data->tempat_lahir = $store->tempat_lahir;
            $data->tanggal_lahir = $store->tanggal_lahir;
            $data->agama = $store->agama;
            $data->jenis_kelamin = $store->jenis_kelamin;
            $data->alamat = $store->alamat;
            $data->universitas = $store->universitas;
            $data->program_studi = $store->program_studi;
            $data->riwayat_pendidikan_sd = $store->riwayat_pendidikan_sd;
            $data->riwayat_pendidikan_smp = $store->riwayat_pendidikan_smp;
            $data->riwayat_pendidikan_sma = $store->riwayat_pendidikan_sma;
            $data->no_hp = $store->no_hp;
            $data->alasan = $store->alasan;
            $data->persetujuan = $store->persetujuan;
            $data->kamar = $store->kamar;
            $data->status = 'Belum Dikonfirmasi';
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
            $data = DataPenghuni::where('uuid', $params)->first();
            $user = User::where('uuid', $data->uuid_user)->first();
            $data->nama = $user->nama;
            $data->username = $user->username;
            $data->password_hash = $user->password_hash;
            $data->foto = $user->foto;
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateDataPenghuniRequest $update, $params)
    {
        try {
            // Ambil data penghuni dan user terkait
            $data = DataPenghuni::where('uuid', $params)->firstOrFail();
            $user = User::where('uuid', $data->uuid_user)->firstOrFail();

            // Handle Foto
            $newFoto = $user->foto; // default ke foto lama
            $oldFotoPath = public_path('/storage/penghuni/' . $user->foto);

            if ($update->file('foto')) {
                $extension = $update->file('foto')->extension();
                $newFoto = 'foto-' . now()->timestamp . '.' . $extension;
                $update->file('foto')->storeAs('public/penghuni', $newFoto);

                // Hapus foto lama
                if (File::exists($oldFotoPath)) {
                    File::delete($oldFotoPath);
                }
            }

            // Update data user
            $user->nama = $update->nama;
            $user->username = $update->username;

            // Jika ingin update password
            if ($update->filled('password_hash')) {
                $user->password_hash = $update->password_hash;
                $user->password = Hash::make($update->password_hash);
            }

            $user->foto = $newFoto;
            $user->save();

            // Update data penghuni
            $data->uuid_user = $user->uuid;
            $data->tempat_lahir = $update->tempat_lahir;
            $data->tanggal_lahir = $update->tanggal_lahir;
            $data->agama = $update->agama;
            $data->jenis_kelamin = $update->jenis_kelamin;
            $data->alamat = $update->alamat;
            $data->universitas = $update->universitas;
            $data->program_studi = $update->program_studi;
            $data->riwayat_pendidikan_sd = $update->riwayat_pendidikan_sd;
            $data->riwayat_pendidikan_smp = $update->riwayat_pendidikan_smp;
            $data->riwayat_pendidikan_sma = $update->riwayat_pendidikan_sma;
            $data->no_hp = $update->no_hp;
            $data->alasan = $update->alasan;
            $data->persetujuan = $update->persetujuan;
            $data->kamar = $update->kamar;
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
            $data = DataPenghuni::where('uuid', $params)->first();
            $user = User::where('uuid', $data->uuid_user)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFotoPath = public_path('/public/penghuni/' . $user->foto);
            // Hapus foto lama jika ada
            if (File::exists($oldFotoPath)) {
                File::delete($oldFotoPath);
            }
            $user->delete();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }

    public function konfirmasi($params)
    {
        try {
            $data = DataPenghuni::where('uuid', $params)->first();
            $data->status = "Terkonfirmasi";
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }

        return $this->sendResponse($data, 'Update data success');
    }

    public function detail($params)
    {
        $module = 'Detail Data Penghuni';
        $data = array();
        try {
            $data = DataPenghuni::where('uuid', $params)->first();
            $user = User::where('uuid', $data->uuid_user)->first();
            $data->nama = $user->nama;
            $data->username = $user->username;
            $data->password_hash = $user->password_hash;
            $data->foto = $user->foto;
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return view('biro.datapenghuni.detail', compact('module', 'data'));
    }
}
