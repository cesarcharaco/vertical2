<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    protected $table='visitas';

    protected $fillable=['nombres','nacionalidad', 'cedula','id_espacio', 'entrada','salida', 'fecha'];


    public function espacios()
    {
    	return $this->belongsTo('App\Espacios','id_espacio');
    }
}
