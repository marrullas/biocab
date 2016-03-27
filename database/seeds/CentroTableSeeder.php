<?php

use App\Centro;
use Illuminate\Database\Seeder;

class CentroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Centro::create(['nombre'=>'CAB','descripcion'=>'Centro agropecuario de buga']);

    }
}
