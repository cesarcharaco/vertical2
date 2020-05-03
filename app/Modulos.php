<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $table='modulos';

    protected $fillable=['menu','ruta','modulo'];

    public function privilegios()
    {
    	return $this->hasMany('App\Privilegios','id_modulo','id');
    }
}
