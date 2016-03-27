<?php

use App\Banco;
use Illuminate\Database\Seeder;

class BancoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Banco::create(['nombre'=>'Bancolombia','descripcion'=>'bancolombia']);
        Banco::create(['nombre'=>'Banco de bogota','descripcion'=>'Banco de bogota']);
        Banco::create(['nombre'=>'Banco Agrario','descripcion'=>'Banco Agrario']);
        Banco::create(['nombre'=>'Banco Av Villas','descripcion'=>'Banco AV Villas']);
        Banco::create(['nombre'=>'Bancamia','descripcion'=>'Bancamia']);
        Banco::create(['nombre'=>'BBVA','descripcion'=>'BBVA']);
        Banco::create(['nombre'=>'Banca Caja Social','descripcion'=>'Banco Caja Social']);
        Banco::create(['nombre'=>'Citibank','descripcion'=>'Citibank']);
        Banco::create(['nombre'=>'Banco colpatria','descripcion'=>'Banco colpatria']);
        Banco::create(['nombre'=>'Banco coomeva','descripcion'=>'Banco coomeva']);
        Banco::create(['nombre'=>'Banco occidente','descripcion'=>'Banco occidente']);
        Banco::create(['nombre'=>'Banco popular','descripcion'=>'Banco popular']);
        Banco::create(['nombre'=>'Banco WWB','descripcion'=>'Banco WWB']);
    }
}
