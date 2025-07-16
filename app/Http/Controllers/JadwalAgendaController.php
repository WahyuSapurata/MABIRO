<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalAgendaRequest;
use App\Http\Requests\UpdateJadwalAgendaRequest;
use App\Models\JadwalAgenda;
use Illuminate\Support\Facades\File;

class JadwalAgendaController extends BaseController
{
    public function index()
    {
        $module = 'Jadwal & Agenda';
        return view('biro.jadwalagenda.index', compact('module'));
    }

    public function get()
    {
        $data = JadwalAgenda::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreJadwalAgendaRequest $store)
    {
        $newAbsen = '';
        if ($store->file('foto_absen')) {
            $extension = $store->file('foto_absen')->extension();
            $newAbsen = 'foto_absen' . '-' . now()->timestamp . '.' . $extension;
            $store->file('foto_absen')->storeAs('public/absen', $newAbsen);
        }

        try {
            $data = new JadwalAgenda();
            $data->nama_agenda = $store->nama_agenda;
            $data->jadwal_pelaksanaan = $store->jadwal_pelaksanaan;
            $data->foto_absen = $newAbsen;
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
            $data = JadwalAgenda::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateJadwalAgendaRequest $update, $params)
    {
        $data = JadwalAgenda::where('uuid', $params)->first();

        $oldAbsenPath = public_path('/public/absen/' . $data->foto_absen);

        $newAbsen = '';
        if ($update->file('foto_absen')) {
            $extension = $update->file('foto_absen')->extension();
            $newAbsen = 'foto_absen' . '-' . now()->timestamp . '.' . $extension;
            $update->file('foto_absen')->storeAs('public/absen', $newAbsen);

            // Hapus foto_absen lama jika ada
            if (File::exists($oldAbsenPath)) {
                File::delete($oldAbsenPath);
            }
        }

        try {
            $data->nama_agenda = $update->nama_agenda;
            $data->jadwal_pelaksanaan = $update->jadwal_pelaksanaan;
            $data->foto_absen = $update->file('foto_absen') ? $newAbsen : $data->foto_absen;
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
            $data = JadwalAgenda::where('uuid', $params)->first();
            // Simpan nama foto_absen lama untuk dihapus
            $oldAbsenPath = public_path('/public/absen/' . $data->foto_absen);
            // Hapus foto_absen lama jika ada
            if (File::exists($oldAbsenPath)) {
                File::delete($oldAbsenPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
