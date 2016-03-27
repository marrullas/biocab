<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();//debe ser misena;
            $table->string('password', 60);
            $table->rememberToken();
            $table->integer('tipousuario')->unsigned()->default(1); //basico, consulta, administrador, super.
            //$table->integer('dependencia')->unsigned()->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->default('default');
            $table->boolean('activo')->default(true);
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
        Schema::drop('users');
    }
}
