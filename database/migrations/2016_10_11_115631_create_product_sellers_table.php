<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSellersTable extends Migration {


    public function up() {
        Schema::create('product_sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->float('price');
            $table->integer('seller_id');
            $table->string('guarantee');
            $table->string('guarantee_en');
            $table->string('delivery');
            $table->string('delivery_en');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('product_sellers');
    }

}
