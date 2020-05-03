<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegios extends Model
{
      protected $table='privilegios';
		
	  protected $fillable=['id','id_modulo','privilegio'];

	  public function usuarios()
	  {
	  	return $this->belongsToMany('App\User','usuarios_has_privilegios','id_privilegio','id_usuario')->withPivot('status');
	  }

	  public function modulos()
	  {
	  	return $this->belongsTo('App\Modulos','id_modulo');
	  }




}
