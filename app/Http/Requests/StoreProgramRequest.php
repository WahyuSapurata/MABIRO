<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
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
            'nama_program' => 'required',
            'deskripsi' => 'required',
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_program.required' => 'Kolom nama program harus di isi.',
            'deskripsi.required' => 'Kolom deskripsi harus di isi.',
            'icon.required' => 'Kolom icon harus di isi.',
        ];
    }
}
