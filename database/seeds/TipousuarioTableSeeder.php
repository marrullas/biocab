<?php

use App\Tipousuario;
use Illuminate\Database\Seeder;

class TipousuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipousuario::create(['nombre'=>'Basico','descripcion'=>'Usuario basico']);
        Tipousuario::create(['nombre'=>'Consulta','descripcion'=>'Usuario de consulta']);
        Tipousuario::create(['nombre'=>'Gestor','descripcion'=>'Usuario gestor']);
        Tipousuario::create(['nombre'=>'Admon','descripcion'=>'Administrador']);
        Tipousuario::create(['nombre'=>'Root','descripcion'=>'super usuario']);
    }
}
