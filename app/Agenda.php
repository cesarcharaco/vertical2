<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table='agenda';

    protected $fillable=['id_solicitud','id_espacio','id_bloque','permanente','color','status'];  

    public function espacios()
    {
    	return $this->belongsTo('App\Espacios','id_espacio');
    }

    public function bloques()
    {
    	return $this->belongsTo('App\Bloques','id_bloque');
    }

    public function solicitudes()
    {
        return $this->belongsTo('App\Solicitudes','id_solicitud');
    }
}
