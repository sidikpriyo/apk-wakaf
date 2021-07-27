<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonasiRequest extends FormRequest
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
            'nominal' => ['required', 'string'],
            'catatan' => ['required', 'string'],
            'donatur_id' => ['required', 'int'],
            'kampanye_id' => ['required', 'int'],
            'pembayaran_id' => ['sometimes', 'int'],
            'status_pembayaran_id' => ['sometimes', 'int'],
        ];
    }
}
