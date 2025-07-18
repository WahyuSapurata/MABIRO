<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataPeminjamanRequest extends FormRequest
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
            'organisasi' => 'required',
            'penanggung_jawab' => 'required',
            'barang' => 'required',
            'nomor_telepon' => 'required',
            'tanggal_pinjam' => 'required',
            'durasi_peminjaman' => 'required',
            'surat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'organisasi.required' => 'Kolom organisasi harus di isi.',
            'penanggung_jawab.required' => 'Kolom penanggung jawab harus di isi.',
            'barang.required' => 'Kolom barang harus di isi.',
            'nomor_telepon.required' => 'Kolom nomor Wa/Telepon harus di isi.',
            'tanggal_pinjam.required' => 'Kolom tanggal pinjam harus di isi.',
            'durasi_peminjaman.required' => 'Kolom durasi peminjaman harus di isi.',
            'surat.required' => 'Kolom file surat harus di isi.',
        ];
    }
}
