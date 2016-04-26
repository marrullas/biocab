<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoformacion extends Model
{
    //
    protected $table = 'tipoformacion';
    protected $fillable = ['nombre','descripcion'];


}
