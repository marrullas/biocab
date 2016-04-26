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
    public function formacion()
    {
        return $this->hasMany(Formacion::class,'user','id');
    }
    public function formacionIngles()
    {
        return $this->hasMany(Formacion::class,'user','id')->hasIngles();
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
        $user = User::nombre($nombre)
            ->tipoformacion()
            ->paginate();
        dd($user);
        return $user;
        return User::with('formacion')
            ->nombre($nombre)
            ->tipoformacion($tipoformacion,$ingles,$pedagogia)
            ->paginate();
/*        if (!empty($tipoformacion || $ingles || $pedagogia)) {

            $query->tipoformacion($tipoformacion,$ingles,$pedagogia);
        }*/
        //return $query->paginate();
    }

    public function scopeNombre($query, $nombre)
    {

        if (!empty($nombre))
            $query->where('name', 'like', "%$nombre%");


    }
/*    public function scopeTipoformacion($query,$tipoformacion,$ingles,$pedagogia)
    {
        $query->join('formacion','formacion.user','=','users.id');
        if(!empty($tipoformacion)) {
            $query->where('formacion.tipoformacion', '=', $tipoformacion);
                }
        if ($ingles){
            //$query->where('formacion.ingles','=',$ingles);

            $query->formacion()->hasIngles();
        }
        if ($pedagogia){
            $query->where('formacion.pedagogia','=',$pedagogia);
        }

    }*/
    public function scopeTipoformacion($query)
    {
        return $query->whereIn('users.id',function($q){
            $q->select('formacion.user')
                ->from('formacion')
                ->where('formacion.ingles',1);
        });
            }
    public function scopeIngles($query,$ingles, $activejoin)
    {
        return $query->where('formacion.ingles',1);
        if($ingles){
            //$query->where('formacion.ingles','=',$ingles);
            if ($activejoin)
                $query->join('formacion','formacion.user','=','users.id');

            $query->where('formacion.ingles','=',$ingles);
        }
    }

    public function hasIngles()
    {
        foreach ($this->formacion()->get() as $formacion)
        {
            if($formacion->ingles == true)
                return true;
        }
        return false;
    }
    
  

}
