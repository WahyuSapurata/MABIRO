<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataTamuRequest extends FormRequest
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
            'nama_tamu' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_tamu.required' => 'Kolom nama tamu harus di isi.',
            'alamat.required' => 'Kolom alamat harus di isi.',
            'tujuan.required' => 'Kolom tujuan harus di isi.',
            'tanggal_masuk.required' => 'Kolom tanggal masuk harus di isi.',
            'tanggal_keluar.required' => 'Kolom tanggal keluar harus di isi.',
        ];
    }
}
