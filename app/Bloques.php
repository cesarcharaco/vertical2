<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloques extends Model
{
    protected $table='bloques';

    protected $fillable=['dia','hora'];

    public function solicitudes()
    {
    	return $this->hasMany('App\Solicitudes','id_bloque','id');
    }

    public function horarios()
    {
    	return $this->hasMany('App\Horarios','id_bloque','id');
    }

    public function agenda()
    {
        return $this->hasMany('App\Agenda','id_bloque','id');
    }

}
