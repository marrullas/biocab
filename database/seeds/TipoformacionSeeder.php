<?php

use App\Tipoformacion;
use Illuminate\Database\Seeder;

class TipoformacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipoformacion::create(['nombre'=>'Complementario','descripcion'=>'Educación complementaria']);
        Tipoformacion::create(['nombre'=>'Tecnico','descripcion'=>'Educación tecnica']);
        Tipoformacion::create(['nombre'=>'Universitario','descripcion'=>'Educación universitaria']);
        Tipoformacion::create(['nombre'=>'Postgrado','descripcion'=>'tutilo de postgrado (espacializacion, maestria, etc']);
        Tipoformacion::create(['nombre'=>'Otro','descripcion'=>'Educación universitaria']);
    }
}
