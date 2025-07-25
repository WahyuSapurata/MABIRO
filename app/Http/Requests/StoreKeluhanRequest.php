<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeluhanRequest extends FormRequest
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
            'ketegori' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ketegori.required' => 'Kolom kategori harus di isi.',
            'keterangan.required' => 'Kolom ketrangan harus di isi.',
        ];
    }
}
