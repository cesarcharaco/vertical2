<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtletasProductos extends Model
{
    protected $table='atletas_has_productos';

    protected $fillable=['status', 'qty']; 
}
