<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiasNoLabUpdateRequest extends FormRequest
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

            'fecha' => 'date|required',
            'motivo' => 'string|required'            


        ];
    }

 public function messages()
    {
        return [

            'fecha.required' => 'El campo fecha no debe estar vacia',
            'fecha.date' => 'Debe ingresar un formato de fecha válido',                   
            'motivo.required' => 'El campo motivo no debe estar vacio'

         ];
    }   
}
