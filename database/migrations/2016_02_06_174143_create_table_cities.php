<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable('cities')) {
            Schema::create('cities', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('region_id')->unsigned();
                $table->integer('country_id')->unsigned();
                $table->string('latitude');
                $table->string('longitude');
                $table->string('name');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //Schema::drop('countries');
    }
}
