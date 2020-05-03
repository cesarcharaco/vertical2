<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitasRequest extends FormRequest
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
            'nombres' => 'required',
            'cedula' => 'required|numeric'
        ];
    }

    public function mesagges()
    {
        return [
            'nombres.required' => 'Los nombres son obligatorios',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.numeric' => 'La cédula sólo debe ontener números'
        ];
    }
}
