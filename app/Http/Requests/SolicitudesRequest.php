<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudesRequest extends FormRequest
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
            'dirigido' => 'required',
            'nombre_actividad' => 'required',
            'responsable' => 'required',
            'fecha' => 'required|date',
            'descripcion_actividad' => 'required',
            'num_asistentes' => 'required|numeric'
        ];
    }

    public function mesagges()
    {
        return [
            'dirigido.required' => 'Debe Ingresar hacia quien va dirigida la actividad',
            'nombre_actividad.required' => 'Debe Ingresar en nombre de la actividad',
            'responsable.required' => 'Debe Ingresar la persona responsable de la actividad',
            'fecha.required' => 'Debe Ingresar la fecha de realizacón de la actividad',
            'fecha.date' => 'Debe Ingresar una fecha válida',
            'descripcion_actividad.required' => 'Debe Ingresar la descripción de la actividad',
            'num_asistentes.required' => 'Debe Ingresar el número máximo aproximado de asistentes en la actividad',
            'num_asistentes.numeric' => 'Debe Ingresar un número en la cantidad de asistentes aproximado a la actividad'

        ];
    }
}
