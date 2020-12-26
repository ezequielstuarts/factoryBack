<?php

namespace App\Http\Requests\Status;

use Illuminate\Foundation\Http\FormRequest;

class StatusUpdateRequest extends FormRequest
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
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:status,name',
        ];
    }
}
