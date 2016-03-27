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
        return $this->belongsTo('\App\citie','lugarexp','id');
    }
    public function citinac()
    {
        return $this->belongsTo('\App\citie','ciudadnacimiento','id');
    }
    public function citires()
    {
        return $this->belongsTo('\App\citie','ciudad','id');
    }
}
