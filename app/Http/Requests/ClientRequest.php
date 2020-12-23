<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'street' => 'required',
            'floor' => 'numeric',
            'phone1' => 'required|numeric',
            'phone2' => 'numeric',
            'email' => 'required|email',
            'dni' => 'required|numeric',
            'cuit' => 'required|numeric',
            'ranking' => 'required|numeric'
        ];
    }
}
