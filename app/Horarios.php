<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table='horarios';

    protected $fillable=['id_bloque','id_empleado'];

    public function bloques()
    {
    	return $this->belongsTo('App\Bloques','id_bloque');
    }

    public function empleados()
    {
    	return $this->belongsTo('App\Empleados','id_empleado');
    }

}
