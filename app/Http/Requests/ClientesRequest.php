<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'nombres' => 'string|required',
            'apellidos' => 'string|required',
            'cedula' => 'numeric|required|digits_between:6,8|unique:clientes'
        ];
    }

public function messages()
    {
        return [
            'nombres.required' => 'El campo nombres no debe estar vació',
            'apellidos.required' => 'El campo apellidos no puede estar vacío',
            'cedula.numeric' => 'El campo cédula solo debe contener números',
            'cedula.required' => 'El campo cédula no debe estar vacío',
            'cedula.digits_between' => 'El campo cédula solo debe tener valores entre 6 y 8 digitos'

        ];
    }
}
