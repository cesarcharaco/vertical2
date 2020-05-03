<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table='asistencia';

    protected $fillable=['fecha','hora','id_empleado','status','motivo'];  
      
    public function empleados()
    {
    	return $this->belongsTo('App\Empleados','id_empleado');
    }

}
