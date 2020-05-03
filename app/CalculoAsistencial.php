<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalculoAsistencial extends Model
{
    protected $table='calculo_asistencial';

    protected $fillable=['id_empleado','dias_l','dias_nl','mes','anio'];

    public function empleados()
    {
    	return $this->belongsTo('App\Empleados','id_empleado');
    }    

}
