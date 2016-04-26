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
    public static function filtroPaginación($nombre=null,$tipoformacion=null,$ingles = false,$pedagogia = false)
    {
/*        return User::nombre($nombre)
            ->tipoformacion($tipoformacion)
            ->ingles($ingles)
            ->paginate();*/
        $query = User::nombre($nombre);
        if (!empty($tipoformacion || $ingles || $pedagogia)) {

            $query->tipoformacion($tipoformacion,$ingles,$pedagogia);
        }
        return $query->paginate();
    }

    public function scopeNombre($query, $nombre)
    {

        if (!empty($nombre))
            $query->where('name', 'like', "%$nombre%");


    }
    public function scopeTipoformacion($query,$tipoformacion,$ingles,$pedagogia)
    {
        $query->join('formacion','formacion.user','=','users.id');
        if(!empty($tipoformacion)) {
            $query->where('formacion.tipoformacion', '=', $tipoformacion);
                }
        if ($ingles){
            $query->where('formacion.ingles','=',$ingles);
        }
        if ($pedagogia){
            $query->where('formacion.pedagogia','=',$pedagogia);
        }

    }

    public function scopeIngles($query,$ingles, $activejoin)
    {
        if($ingles){
            //$query->where('formacion.ingles','=',$ingles);
            if ($activejoin)
                $query->join('formacion','formacion.user','=','users.id');

            $query->where('formacion.ingles','=',$ingles);
        }
    }
    
  

}
