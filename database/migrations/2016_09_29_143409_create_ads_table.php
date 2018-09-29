<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration {

    public function up() {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('link');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('ads');
    }

}
