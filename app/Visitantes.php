<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitantes extends Model
{
    protected $table='visitantes';

    protected $fillable=['id_cliente','id_espacio','salida'];

    public function clientes()
    {
    	return $this->belongsTo('App\Clientes','id_cliente');
    }

    public function espacios()
    {
    	return $this->belongsTo('App\Espacios','id_espacio');
    }

}
