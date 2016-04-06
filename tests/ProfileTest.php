<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{

    use DatabaseMigrations;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->assertTrue(true);
    }

    public function testProfileLanding()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/profile')
            ->see('Copyright ')
            ->see('Mauricio Fernandez')
            ->see('Resumen perfil')
            ->see($user->name);
    }
    public function testBioLanding()
    {
        $user = factory(App\User::class)->create();
        //$bio = factory(App\Bio::class)->create();

        $this->actingAs($user)
            ->visit('/bio')
            ->see('Resumen perfil')
            ->see('Ingresar Datos')
            //->see('Editar Datos')
            ->see($user->name);
    }
    
    public function testBioCreate()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('/bio/create')
            ->see('Ingresar datos')
            ->see('Guardar')
            ->see('volver sin guardar');
    }
}
