<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'last_name.required' => 'El apellido es requerido',
            'address.required' => 'La direccion es requerida',
            'phone1.required' => 'El telefono es requerido',
            'phone1.numeric' => 'El teléfono debe ser numerico',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no tiene formato válido',
            'email.unique' => 'El email ya existe',
            'dni.numeric' => 'El DNI debe ser numerico',
            'dni.unique' => 'Ya existe un DNI con ese valor',
            'dni.required' => 'El DNI es requerido',
            'cuit.numeric' => 'El CUIT debe ser numerico',
            
        ];
    }
    
    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone1' => 'required|numeric',
            'phone2' => 'numeric',
            'email' => 'required|email|unique:clients,email',
            'dni' => 'required|numeric|unique:clients,dni',
            'cuit' => 'numeric',
            'ranking' => 'numeric'
        ];
    }

}
