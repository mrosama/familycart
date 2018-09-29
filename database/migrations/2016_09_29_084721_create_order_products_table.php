<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration {

    public function up() {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('qty');
            $table->integer('seller_id');
            $table->integer('color_size_id');
            $table->float('price');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('order_products');
    }

}
