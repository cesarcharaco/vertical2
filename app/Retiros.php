<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiros extends Model
{
    protected $table='retiros';

    protected $fillable=['id_producto','id_usuario','cantidad','observacion'];

    public function productos()
	{
		return $this->belongsTo('App\Productos','id_producto');	
	}

	public function usuarios()
	{
		return $this->belongsTo('App\User','id_usuario');	
	}  

}
