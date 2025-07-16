<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataInventarisRequest extends FormRequest
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
            'no_inventaris' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'baik' => 'required',
            'kurang_baik' => 'required',
            'rusak' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_inventaris.required' => 'Kolom no inventaris harus di isi.',
            'nama_barang.required' => 'Kolom nama barang harus di isi.',
            'jumlah.required' => 'Kolom jumlah harus di isi.',
            'satuan.required' => 'Kolom satuan harus di isi.',
            'baik.required' => 'Kolom baik harus di isi.',
            'kurang_baik.required' => 'Kolom kurang baik harus di isi.',
            'rusak.required' => 'Kolom rusak harus di isi.',
        ];
    }
}
