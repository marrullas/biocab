<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    //
    protected $table = 'experiencia';
    protected $fillable = ['user', 'empresa', 'cargo', 'publica', 'ciudad', 'fechaingreso', 'fechasalida', 'meseslaborados',
        'funciones', 'docente', 'archivo'];

    public function citiempresa()
    {
        return $this->belongsTo(Citie::class,'ciudad','id');
    }
}
