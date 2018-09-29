<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOffersTable extends Migration {

    public function up() {
        Schema::create('product_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('offer_id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('product_offers');
    }

}
