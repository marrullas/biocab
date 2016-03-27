<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExperiencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();//llave usuario
            $table->string('empresa');
            $table->string('cargo'); //cargo
            $table->boolean('publica')->default(false);
            $table->integer('ciudad')->unsigned(); //llave ciudades
            $table->string('telefono')->nullable(); //llave ciudades
            $table->date('fechaingreso');//fecha de ultimo periodo cursado
            $table->date('fechasalida')->nullable();//fecha de ultimo periodo cursado
            $table->integer('meseslaborados')->nullable();//numero de meses laborados
            $table->text('funciones')->nullable(); //funciones que desempeño
            $table->boolean('docente')->default(false);//esta experiencia es docente?
            $table->string('archivo')->nullable();//evidencia
            $table->foreign('user')->references('id')->on('users');
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
        Schema::drop('experiencia');
    }
}
