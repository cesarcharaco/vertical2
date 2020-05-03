<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table='clientes';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','telefono','correo','colabora'];

	public function solicitudes()
	{
		return $this->hasMany('App\Solicitudes','id_cliente','id');
	}  

	

}
