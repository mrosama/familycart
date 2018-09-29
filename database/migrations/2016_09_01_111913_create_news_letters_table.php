<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsLettersTable extends Migration {

    public function up() {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('newsletters');
    }

}
