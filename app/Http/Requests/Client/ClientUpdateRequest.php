<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => '',
            'surname' => '',
            'adress' => '',
            'phone1' => 'numeric',
            'phone2' => 'numeric',
            'email' => 'email|unique:clients,email',
            'dni' => 'numeric|unique:clients,dni',
            'cuit' => 'numeric',
            'ranking' => 'numeric'
        ];
    }
}
