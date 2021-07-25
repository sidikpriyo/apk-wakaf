<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KampanyeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => ['required', 'string'],
            'gambar' => ['sometimes'],
            'keterangan' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'kebutuhan' => ['required', 'int'],
            'tanggal_berakhir' => ['required', 'date'],
            'lembaga_id' => ['required', 'int'],
            'kategori_id' => ['required', 'int'],
        ];
    }
}
