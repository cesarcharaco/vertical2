<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|regex:/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/',
            'password_confirmation' => 'required|same:password',
            'name' => 'required',
            'pregunta' => 'required',
            'respuesta' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'email.required' => 'Debe ingresar el email',
        'email.email' => 'Debe ingresar un formato correcto para el email',
        'password.required' => 'Debe ingresar la nueva clave',
        'password.regex' => 'La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. Puede tener otros símbolos.',
        'password.confirmed' => 'Las claves no coinciden',
        'name.required' => 'Debe ingresar el nombre',
        'pregunta.required' => 'Debe ingresar su pregunta de seguridad',
        'respuesta.required' => 'Debe Ingresar su respuesta de seguridad'
        ];
    }
}
