<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipousuario','descripcion', 'imagen', 'activo',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipouser()
    {
        return $this->belongsTo('\App\Tipousuario','tipousuario','id');
    }
    public function bio()
    {
        return $this->hasOne('\App\Bio','user','id');
    }
    //inside App\User:
    public function hasBio(){

        return (bool) $this->bio()->first();
    }
}
