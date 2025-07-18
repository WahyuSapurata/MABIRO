<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Support\Facades\File;

class ProgramController extends BaseController
{
    public function index()
    {
        $module = 'Program';
        return view('biro.program.index', compact('module'));
    }

    public function get()
    {
        $data = Program::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreProgramRequest $store)
    {
        $newIcon = '';
        if ($store->file('icon')) {
            $extension = $store->file('icon')->extension();
            $newIcon = 'icon' . '-' . now()->timestamp . '.' . $extension;
            $store->file('icon')->storeAs('public/program', $newIcon);
        }

        try {
            $data = new Program();
            $data->nama_program = $store->nama_program;
            $data->deskripsi = $store->deskripsi;
            $data->icon = $newIcon;
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
            $data = Program::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(UpdateProgramRequest $update, $params)
    {
        $data = Program::where('uuid', $params)->first();

        $oldIconPath = public_path('/public/program/' . $data->icon);

        $newIcon = '';
        if ($update->file('icon')) {
            $extension = $update->file('icon')->extension();
            $newIcon = 'icon' . '-' . now()->timestamp . '.' . $extension;
            $update->file('icon')->storeAs('public/program', $newIcon);

            // Hapus icon lama jika ada
            if (File::exists($oldIconPath)) {
                File::delete($oldIconPath);
            }
        }

        try {
            $data->nama_program = $update->nama_program;
            $data->deskripsi = $update->deskripsi;
            $data->icon = $update->file('icon') ? $newIcon : $data->icon;
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
            $data = Program::where('uuid', $params)->first();
            // Simpan nama icon lama untuk dihapus
            $oldIconPath = public_path('/public/program/' . $data->icon);
            // Hapus icon lama jika ada
            if (File::exists($oldIconPath)) {
                File::delete($oldIconPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete data success');
    }
}
