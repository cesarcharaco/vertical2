<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    protected $table='solicitudes';

    protected $fillable=['id_bloque','id_espacio','num_bloques','dirigido','nombre_actividad','responsable','permanente','fecha','status','descripcion_actividad','num_asistentes','id_cliente']; 


    public function bloques()
    {
    	return $this->beLongsTo('App\Bloques','id_bloque');
    }

    public function espacios()
    {
    	return $this->beLongsTo('App\Espacios','id_espacio');
    }

    public function clientes()
    {
    	return $this->beLongsTo('App\Clientes','id_cliente');
    }

    public function productos()
    {
        return $this->beLongsToMany('App\Productos','clientes_has_productos','id_solicitud','id_producto')->withPivot('id','status','fecha_entrega','cantidad');
    }

    public function agenda()
    {
        return $this->hasMany('App\Agenda','id_solicitud','id');
    }

}
