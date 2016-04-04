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
        return $this->belongsTo('\App\dependencia','dependencia','id');
    }
}
