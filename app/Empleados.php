<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table='empleados';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','correo','movil','local','acceso','id_cargo'];


	public function cargos()
	{
		return $this->belongsTo('App\Cargos','id_cargo');
	}

	public function calculos()
	{
		return $this->hasMany('App\CalculoAsistencial','id_empleado','id');
	}

	public function horarios()
	{
		return $this->hasMany('App\Horarios','id_empleado','id');
	}

	public function asistencia()
	{
		return $this->hasMany('App\Asistencia','id_empleado','id');
	}
}
