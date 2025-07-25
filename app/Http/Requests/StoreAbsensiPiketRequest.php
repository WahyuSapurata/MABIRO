<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiPiketRequest extends FormRequest
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
            'uuid_penghuni' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uuid_penghuni.required' => 'Kolom nama harus di isi.',
            'lokasi.required' => 'Kolom loksi harus di isi.',
            'waktu.required' => 'Kolom waktu harus di isi.',
        ];
    }
}
