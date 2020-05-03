<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargosRequets extends FormRequest
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
            
            'cargo' => 'string|required|unique:cargos'

        ];
    }

    public function messages()
    {
        return [
            'cargo.required' => 'El campo cargo no debe estar vació',
            'cargo.unique' => 'Cargo ya registrado, ingrese otro cargo'
        ];
    }


}
