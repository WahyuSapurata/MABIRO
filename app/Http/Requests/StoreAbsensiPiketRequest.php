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
            'tanggal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uuid_penghuni.required' => 'Kolom nama harus di isi.',
            'tanggal.required' => 'Kolom tanggal piket harus di isi.',
        ];
    }
}
