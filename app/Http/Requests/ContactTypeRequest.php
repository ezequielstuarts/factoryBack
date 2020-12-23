<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactTypeRequest extends FormRequest
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
            'name.required' => 'El nombre es requerido',
            'name.unique' => 'Ese nombre ya existe'
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:Contact_types',
        ];
    }
}
