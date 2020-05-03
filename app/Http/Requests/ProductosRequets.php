<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequets extends FormRequest
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
            'nombre' => 'string|required|unique:productos',       
            'stock' => 'numeric|required',
            'codigo' => 'numeric|required|unique:productos'

        ];
    }


    public function messages()
    {
        return [

            'nombre.required' => 'El campo nombre no debe estar vació',
            'nombre.unique' => 'Nombre ya registrado, ingrese otro nombre',       
            'stock.numeric' => 'El campo stock solo debe tener numeros',
            'stock.required' => 'El campo stock no de debe estar vació',
            'codigo.required' => 'El campo no debe estar vació',
            'codigo.unique' => 'Código ya registrado, ingrese otro código',
            'codigo.numeric' => 'El Código solo debe contener números'

        ];
    }
}