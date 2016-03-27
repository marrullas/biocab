<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    //
    protected $table = 'formacion';
    protected $fillable = ['user','titulo','descripcion','ciudad','terminado','fechaterminado','institucion','virtual','distacia',
    'archivo','pedagodia','ingles'];

    public function citiinstitucion()
    {
        return $this->belongsTo('\App\citie','ciudad','id');
    }
}
