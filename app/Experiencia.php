<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    //
    protected $table = 'experiencia';
    protected $fillable = ['user', 'empresa', 'cargo', 'publica', 'ciudad', 'fechaingreso', 'fechasalida', 'meseslaborados',
        'funciones', 'docente', 'archivo'];

    protected $dates = ['fechaingreso','fechasalida'];
    //protected $dateFormat =

    public function citiempresa()
    {
        return $this->belongsTo(Citie::class,'ciudad','id');
    }

    public function setFechaingresoAttribute($value)
    {
        if (!empty($value))
        $this->attributes['fechaingreso'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function setFechasalidaAttribute($value)
    {
        if (!empty($value))
        $this->attributes['fechasalida'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function getFechaingresoAttribute($value)
    {

        if (!empty($value))
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
    public function getFechasalidaAttribute($value)
    {
        if (!empty($value))
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
}
