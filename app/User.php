<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo_usuario', 'pregunta', 'respuesta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function privilegios()
    {
        return $this->belongsToMany('App\Privilegios','usuarios_has_privilegios','id_usuario','id_privilegio')->withPivot('status');
    }

    public function retiros()
    {
        return $this->hasMany('App\Retiros','id_usuario','id');
    }

    public function bitacora()
    {
        return $this->hasMany('App\Bitacora','id_usuario','id');   
    }
}
