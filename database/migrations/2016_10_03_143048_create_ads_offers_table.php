<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsOffersTable extends Migration {

    public function up() {
        Schema::create('ads_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_ads');
            $table->string('first_link');
            $table->string('second_ads');
            $table->string('second_link');
            $table->string('third_ads');
            $table->string('third_link');
            $table->string('fourth_ads');
            $table->string('fourth_link');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('ads_offers');
    }

}
