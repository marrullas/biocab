<?php

use App\Dependencia;
use Illuminate\Database\Seeder;

class DependenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Dependencia::create(['nombre'=>'Adminitración','descripcion'=>'Area administrativa']);
        Dependencia::create(['nombre'=>'Compras','descripcion'=>'Area compras']);
        Dependencia::create(['nombre'=>'Bienestar aprendiz','descripcion'=>'Area Bienestar']);
        Dependencia::create(['nombre'=>'Formación titulada','descripcion'=>'Area Formación titulada']);
        Dependencia::create(['nombre'=>'Jovenes Rurales','descripcion'=>'Area Jovenes Rurales']);
        Dependencia::create(['nombre'=>'Articulación con la educación media','descripcion'=>'Area Artuiculación']);
    }
}
