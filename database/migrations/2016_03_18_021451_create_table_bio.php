<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();//llave usuario
            $table->string('identificacion',18);
            $table->string('imagendocumento')->nullable(); //archivo de imagen del documento
            $table->string('lugarexp'); //lugar de expedición documento
            $table->enum('sexo',['M','F','Otro'])->nullable();
            $table->date('fechanacimiento');
            $table->integer('ciudadnacimiento')->unsigned();//ciudad nacimiento (relación con codigo ciudad)
            $table->string('correosena')->unique();
            $table->string('correopersonal')->unique();
            $table->string('telefono',18);
            $table->string('telefono1',18)->nullable(); //telefono adicional
            $table->integer('ciudad')->unsigned();// ciudad residencia
            $table->string('direccion');
            $table->integer('centro')->unsigned()->nullable(); //empresa organización a la que pertenece
            $table->integer('dependencia')->unsigned(); //Area (articulación, admon, titulada, etc)
            $table->string('banco');
            $table->string('numerocuenta');//numero de cuenta del banco
            $table->boolean('ahorros')->default(true);
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('ciudadnacimiento')->references('id')->on('cities');
            $table->foreign('ciudad')->references('id')->on('cities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bio');
    }
}
