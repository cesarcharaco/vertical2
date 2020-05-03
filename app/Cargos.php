<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{

    protected $table='cargos';

    protected $fillable=['cargos'];

public function empleados()
{
	return $this->hashMany('App\Empleados','id_cargo','id');
}
}
