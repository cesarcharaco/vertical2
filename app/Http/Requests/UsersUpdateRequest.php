<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'email' => 'required|email',
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
        'name.required' => 'Debe ingresar el nombre',
        'pregunta.required' => 'Debe ingresar su pregunta de seguridad',
        'respuesta.required' => 'Debe Ingresar su respuesta de seguridad'
        ];
    }
}
