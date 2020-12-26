<?php

namespace App\Http\Requests\UnsubscribeMotive;

use Illuminate\Foundation\Http\FormRequest;

class UnsubscribeMotiveStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre del estado es requerido',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:status,name',
        ];
    }
}
