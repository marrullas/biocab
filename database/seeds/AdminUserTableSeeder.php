<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['name'=>'Liliana Urriago','email'=>'liliana.urriago@sena.edu.co','password'=>bcrypt('ConsultaPruebas'),
            'tipousuario' => 4,'imagen'=>'default-user.jpg','activo'=>1]);

    }
}
