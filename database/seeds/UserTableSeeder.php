<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['name'=>'Mauricio Fernandez','email'=>'marrullas@gmail.com','password'=>bcrypt('k4lastor'),
        'tipousuario' => 4,'imagen'=>'default-user.jpg','activo'=>1]);
    }
}
