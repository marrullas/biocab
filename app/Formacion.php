<?php

namespace App;

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

    public function tipoformacionnombre()
    {
        return $this->belongsTo(Tipoformacion::class,'tipoformacion','id');
    }
}
