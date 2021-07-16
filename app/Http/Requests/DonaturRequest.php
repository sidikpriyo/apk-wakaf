<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class DonaturRequest extends FormRequest
{
    protected $id;

    public function __construct(Request $request)
    {
        $this->id = (int) $request->donatur->id;
    }

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
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique((new User)->getTable())->ignore($this->id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
