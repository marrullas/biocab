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
            ->tipoformacion($tipoformacion,$ingles,$pedagogia)
            ->paginate();
        //dd($user);
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

    public function scopeTipoformacion($query,$tipoformacion,$ingles,$pedagogia)
    {
        if (!empty($tipoformacion || $ingles || $pedagogia)) {
            return $query->whereIn('users.id', function ($q) use ($tipoformacion, $ingles, $pedagogia) {
                $q->select('formacion.user')
                    ->from('formacion');
                if (!empty($tipoformacion)) {
                    $q->where('formacion.tipoformacion', '=', $tipoformacion);
                }
                if ($ingles)
                    $q->where('formacion.ingles', 1);

                if ($pedagogia)
                    $q->where('formacion.pedagogia', 1);
            });
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
