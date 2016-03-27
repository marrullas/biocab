<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(DependenciaTableSeeder::class);
        $this->call(CentroTableSeeder::class);
        $this->call(BancoTableSeeder::class);
        $this->call(TipousuarioTableSeeder::class);
    }
}
