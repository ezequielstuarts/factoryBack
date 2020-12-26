<?php

namespace App\Http\Requests\Status;

use Illuminate\Foundation\Http\FormRequest;

class StatusStoreRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'El nombre del estado es requerido',
            'name.unique' => 'Ese estado ya existe',
            'active.required' => 'El estado debe ser activo o no activo'
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:status,name',
            'active' => 'required'
        ];
    }
}
