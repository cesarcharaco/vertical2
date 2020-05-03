<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtletasRequets extends FormRequest
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
            'nacionalidad' => 'string|required',
            'cedula' => 'numeric|required|digits_between:6,8|unique:atletas'
        ];
    }

public function messages()
    {
        return [
            'nombres.required' => 'El campo nombres no debe estar vació',
            'apellidos.required' => 'El campo apellidos no puede estar vacío',
            'nacionalidad.required' => 'Debe seleccionar la nacionalidad',
            'cedula.numeric' => 'El campo cédula solo debe contener números',
            'cedula.required' => 'El campo cédula no debe estar vacío',
            'cedula.digits_between' => 'El campo cédula solo debe tener valores entre 6 y 8 digitos'

        ];
    }
}
