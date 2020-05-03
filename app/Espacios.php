<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacios extends Model
{
    protected $table='espacios';

    protected $fillable=['espacio','piso','limite_personas'];

    public function solicitudes()
    {
    	return $this->hasMany('App\Solicitudes','id_espacio','id');
    }

    public function visitantes()
    {
    	return $this->hasMany('App\Visitantes','id_espacio','id');
    }

    public function agenda()
    {
        return $this->hasMany('App\Agenda','id_espacio','id');
    } 

}
