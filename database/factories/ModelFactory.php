<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'tipousuario' => factory(App\Tipousuario::class)->create()->id,
    ];
});
$factory->defineAs(App\User::class, 'usermany',function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),

    ];
});
$factory->defineAs(App\User::class, 'useradmin',function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'tipousuario' => factory(App\Tipousuario::class)->create(['id'=> 4,'nombre'=>'Admon'])->id,

    ];
});
$factory->define(App\Banco::class, function (Faker\Generator $faker) {
    return [
        'nombre' =>  $faker->word ,
        'descripcion' =>  $faker->word ,
    ];
});

$factory->define(App\Bio::class, function (Faker\Generator $faker) {
    return [
        'user' =>  $faker->randomNumber() ,
        'identificacion' =>  $faker->word ,
        'imagendocumento' =>  $faker->word ,
        'lugarexp' =>  factory(App\Citie::class)->create()->id ,
        'sexo' =>  $faker->word ,
        'fechanacimiento' =>  $faker->date() ,
        'ciudadnacimiento' =>  factory(App\Citie::class)->create()->id ,
        'correosena' =>  $faker->word ,
        'correopersonal' =>  $faker->word ,
        'telefono' =>  $faker->word ,
        'telefono1' =>  $faker->word ,
        'ciudad' =>  factory(App\Citie::class)->create()->id ,
        'direccion' =>  $faker->word ,
        'centro' =>  $faker->randomNumber() ,
        'dependencia' =>  factory(App\Dependencia::class)->create()->id ,
        'banco' =>  $faker->word ,
        'numerocuenta' =>  $faker->word ,
        'ahorros' =>  $faker->boolean ,
        'user' => function(){
            return factory(App\User::class)->create()->id;
        },
        'ciudadnacimiento' => function(){
            return factory(App\Citie::class)->create()->id;
        },
        'ciudad' => function(){
            return factory(App\Citie::class)->create()->id;
        },
        'lugarexp' => function(){
            return factory(App\Citie::class)->create()->id;
        },
    ];
});

$factory->define(App\Centro::class, function (Faker\Generator $faker) {
    return [
        'nombre' =>  $faker->word ,
        'descripcion' =>  $faker->word ,
    ];
});

$factory->define(App\Citie::class, function (Faker\Generator $faker) {
    return [
        'region_id' =>  factory(App\region::class)->create()->id ,
        'country_id' =>  factory(App\countrie::class)->create()->id ,
        'latitude' =>  $faker->latitude ,
        'longitude' =>  $faker->longitude ,
        'name' =>  $faker->name ,
    ];
});

$factory->define(App\countrie::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'code' =>  $faker->word ,
    ];
});

$factory->define(App\Dependencia::class, function (Faker\Generator $faker) {
    return [
        'nombre' =>  $faker->word ,
        'descripcion' =>  $faker->word ,
    ];
});

$factory->define(App\Experiencia::class, function (Faker\Generator $faker) {
    return [
        'user' =>  $faker->randomNumber() ,
        'empresa' =>  $faker->word ,
        'cargo' =>  $faker->word ,
        'publica' =>  $faker->boolean ,
        'ciudad' =>  factory(App\Citie::class)->create()->id ,
        'telefono' =>  $faker->word ,
        'fechaingreso' =>  $faker->date() ,
        'fechasalida' =>  $faker->date() ,
        'meseslaborados' =>  $faker->randomNumber() ,
        'funciones' =>  $faker->text ,
        'docente' =>  $faker->boolean ,
        'archivo' =>  $faker->word ,
    ];
});

$factory->define(App\Formacion::class, function (Faker\Generator $faker) {
    return [
        //'user' =>  $faker->randomNumber() ,
        'titulo' =>  $faker->word ,
        'descripcion' =>  $faker->text ,
        'ciudad' =>  factory(App\Citie::class)->create()->id ,
        'terminado' =>  $faker->boolean ,
        'fechaterminado' =>  $faker->date() ,
        'tipoformacion' =>  factory(App\Tipoformacion::class)->create()->id ,
        'institucion' =>  $faker->word ,
        'virtual' =>  $faker->boolean ,
        'distacia' =>  $faker->boolean ,
        'pedagogia' =>  $faker->boolean ,
        'ingles' =>  $faker->boolean ,
        'archivo' =>  $faker->word ,
    ];
});

$factory->define(App\region::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'code' =>  $faker->word ,
        'country_id' =>  $faker->randomNumber() ,
    ];
});

$factory->define(App\Tipoformacion::class, function (Faker\Generator $faker) {
    return [
        'nombre' =>  $faker->word ,
        'descripcion' =>  $faker->word ,
    ];
});

$factory->define(App\Tipousuario::class, function (Faker\Generator $faker) {
    return [
        'nombre' =>  $faker->word ,
        'descripcion' =>  $faker->word ,
    ];
});

