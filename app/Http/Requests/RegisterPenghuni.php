<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPenghuni extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'password_hash' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'universitas' => 'required',
            'program_studi' => 'required',
            'riwayat_pendidikan' => 'required',
            'no_hp' => 'required',
            'alasan' => 'required',
            'persetujuan' => 'required',
            'foto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Kolom username harus di isi.',
            'password_hash.required' => 'Kolom password harus di isi.',
            'nama.required' => 'Kolom nama harus di isi.',
            'tempat_lahir.required' => 'Kolom tempat lahir harus di isi.',
            'tanggal_lahir.required' => 'Kolom tanggal lahir harus di isi.',
            'agama.required' => 'Kolom agama harus di isi.',
            'jenis_kelamin.required' => 'Kolom jenis kelamin harus di isi.',
            'alamat.required' => 'Kolom alamat harus di isi.',
            'universitas.required' => 'Kolom universitas harus di isi.',
            'program_studi.required' => 'Kolom program studi harus di isi.',
            'riwayat_pendidikan.required' => 'Kolom riwayat pendidikan harus di isi.',
            'no_hp.required' => 'Kolom no hp harus di isi.',
            'alasan.required' => 'Kolom alasan harus di isi.',
            'persetujuan.required' => 'Kolom persetujuan harus di isi.',
            'foto.required' => 'Kolom foto harus di isi.',
        ];
    }
}
