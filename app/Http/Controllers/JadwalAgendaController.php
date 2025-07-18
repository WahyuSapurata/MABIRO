<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalAgendaRequest;
use App\Http\Requests\UpdateJadwalAgendaRequest;
use App\Models\JadwalAgenda;
use App\Models\Program;
use Illuminate\Support\Facades\File;

class JadwalAgendaController extends BaseController
{
    public function index()
    {
        $module = 'Jadwal & Agenda';
        $program = Program::all();
        return view('biro.jadwalagenda.index', compact('module', 'program'));
    }

    public function get()
    {
        $data = JadwalAgenda::all();
        $data->map(function ($item) {
            $item->nama_program = Program::where('uuid', $item->uuid_program)->value('nama_program');
            return $item;
        });
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
            $data->uuid_program = $store->uuid_program;
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
            $data->uuid_program = $update->uuid_program;
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

    // user
    public function agenda()
    {
        $module = 'Agenda';
        $data = JadwalAgenda::latest()->paginate(6);
        $data->map(function ($item) {
            $program = Program::where('uuid', $item->uuid_program)->first();

            $item->nama_program = $program->nama_program;
            $item->icon = $program->icon;
            return $item;
        });
        return view('user.agenda', compact('module', 'data'));
    }
}
