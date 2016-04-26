<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    //
    protected $table = 'formacion';
    protected $fillable = ['user','titulo','descripcion','ciudad','terminado','fechaterminado','institucion',
        'tipoformacion','virtual','distacia','archivo','pedagodia','ingles'];

    public function citiinstitucion()
    {
        return $this->belongsTo('\App\Citie','ciudad','id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user');
    }

    public function tipoformacionnombre()
    {
        return $this->belongsTo(Tipoformacion::class,'tipoformacion','id');
    }
    public function setFechaterminadoAttribute($value)
    {
        if (!empty($value))
            $this->attributes['fechaterminado'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function getFechaterminadoAttribute($value)
    {

        if (!empty($value))
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
    
   public function scopeHasIngles($query)
    {

        return $query->where('ingles',1);
    }

}
