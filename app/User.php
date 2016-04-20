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
        return $this->belongsTo(Tipousuario::class,'tipousuario','id');
    }
    public function bio()
    {
        return $this->hasOne('\App\Bio','user','id');
    }
    public function tipoformacion()
    {
        return $this->hasMany(Tipoformacion::class,'user','id');
    }
    //inside App\User:
    public function hasBio(){

        return (bool) $this->bio()->first();
    }
    public function getTipousuarioLogueadoAttribute()
    {
        //dd('por aca');
        return $this->tipouser->descripcion;
    }
    public static function filtroPaginación($nombre=null,$tipoformacion=null)
    {
        return User::nombre($nombre)
            ->tipoformacion($tipoformacion)
            ->paginate();
    }

    public function scopeNombre($query, $nombre)
    {

        if (!empty($nombre))
            $query->where('name', 'like', "%$nombre%");


    }
    public function scopeTipoformacion($query,$tipoformacion)
    {
        if(!empty($tipoformacion)) {
            //$query->tipoformacion()->where('nombre', 'like', "%$tipoformacion%");
            $query->join('formacion','formacion.user','=','users.id')
                ->where('formacion.tipoformacion','=',$tipoformacion);
        }
    }
    
  

}
