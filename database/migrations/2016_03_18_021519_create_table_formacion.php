<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFormacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();//llave usuario
            $table->string('titulo');
            $table->integer('ciudad')->unsigned(); //llave ciudades
            $table->boolean('terminado')->default(false);
            $table->date('fechaterminado');//fecha de ultimo periodo cursado
            $table->string('institucion');//nombre de la institucion de la formacion
            $table->boolean('virtual')->default(false);
            $table->boolean('distacia')->default(false);
            $table->string('archivo');//evidencia
            $table->boolean('pedagogia')->default(false);
            $table->boolean('ingles')->default(false);
            $table->foreign('user')->references('id')->on('users');
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
        Schema::drop('formacion');
    }
}
