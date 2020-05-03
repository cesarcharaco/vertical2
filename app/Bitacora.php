<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table='bitacora';

    protected $fillable=['id_usuario','operacion','created_at'];

    public function usuarios()
    {
    	return $this->belongsTo('App\User','id_usuario');
    }
}
