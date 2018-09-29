<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{

    public function up() {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->float('charge_value');
            $table->timestamps();
        });
    }


    public function down() {
        //
        Schema::drop('cities');
    }
}