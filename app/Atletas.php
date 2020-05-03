<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atletas extends Model
{
    protected $table='atletas';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula']; 

    public function productos()
    {
        return $this->belongsToMany('App\Productos','atletas_has_productos','id_atleta','id_producto')->withPivot('status','mes','id');
    }

}
