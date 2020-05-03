<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiasNoLab extends Model
{
    protected $table='dias_nolab';

    protected $fillable=['fecha','motivo'];    

}
