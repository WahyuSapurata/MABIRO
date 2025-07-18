<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFasilitasRequest extends FormRequest
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
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_fasilitas.required' => 'Kolom nama fasilitas program agenda harus di isi.',
            'deskripsi.required' => 'Kolom deskripsi pelaksanaan harus di isi.',
        ];
    }
}
