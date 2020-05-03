<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table='categorias';

    protected $fillable=['categoria']; 

   public function productos()
   {
   	return $this->hasMany('App\Productos','id_categoria','id');
   }   

}
