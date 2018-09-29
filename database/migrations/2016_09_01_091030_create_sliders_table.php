<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

    public function up() {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_en');
            $table->string('image');
            $table->text('desc');
            $table->text('desc_en');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('sliders');
    }

}
