<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosUpdateRequest extends FormRequest
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
            
            'nombre' => 'string|required',
            'stock' =>  'numeric|required',
            'codigo' => 'string|required'

        ];
    }

 public function messages()
    {
        return [

            'nombre.required' => 'El campo nombre no debe estar vació',                   
            'stock.numeric' => 'El campo stock solo debe tener numeros',
            'stock.required' => 'El campo stock no de debe estar vació',
            'codigo.required' => 'El campo no debe estar vació'

        ];
    }

}

