<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSelayangPandangRequest extends FormRequest
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
            'deskripsi' => 'required',
            'gambar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'deskripsi.required' => 'Kolom deskripsi harus di isi.',
            'gambar.required' => 'Kolom gambar harus di isi.',
        ];
    }
}
