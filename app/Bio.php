<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    //
    protected $table = 'bio';
    protected $fillable = ['id','user',
        'identificacion', 'imagendocumento','lugarexp', 'fechanacimiento',
        'ciudadnacimiento','sexo','correosena','correopersonal','telefono',
        'telefono1','ciudad','direccion','centro','dependencia','banco','numerocuenta'
        ,'ahorros'
    ];
    public function citiexp()
    {
        return $this->belongsTo(Citie::class,'lugarexp','id');
    }
    public function citinac()
    {
        return $this->belongsTo('\App\Citie','ciudadnacimiento','id');
    }
    public function citires()
    {
        return $this->belongsTo('\App\Citie','ciudad','id');
    }
    public function dependenciauser()
    {
        return $this->belongsTo(Dependencia::class,'dependencia','id');
    }
    public function setFechanacimientoAttribute($value)
    {
        if (!empty($value))
            $this->attributes['fechanacimiento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function getFechanacimientoAttribute($value)
    {

        if (!empty($value))
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
}
