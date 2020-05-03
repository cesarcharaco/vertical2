<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';

    protected $fillable=['nombre','stock','codigo','id_categoria'];
    
    public function categorias()
    {
    	return $this->belongsTo('App\Categorias','id_categoria');
    }

    public function retiros()
    {
    	return $this->hasMany('App\Retiros','id_producto','id');
    }

    public function solicitudes()
    {
        return $this->belongsToMany('App\Solicitudes','clientes_has_productos','id_producto','id_solicitud')->withPivot('id','status','fecha_entrega','cantidad');
    }

    public function atletas()
    {
        return $this->belongsToMany('App\Atletas','atletas_has_productos','id_producto','id_atleta')->withPivot('status','mes','id');
    }

}
