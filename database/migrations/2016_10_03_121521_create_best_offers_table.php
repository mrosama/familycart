<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBestOffersTable extends Migration {

    public function up() {
        Schema::create('best_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_img');
            $table->string('first_img');
            $table->string('second_img');
            $table->string('third_img');
            $table->string('fourth_img');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('best_offers');
    }

}
