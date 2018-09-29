<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColorsSizesTable extends Migration {

    public function up() {
        Schema::create('product_colors_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('quantity');
            $table->string('name_ar');
            $table->string('name_en');
            $table->float('original_price');
            $table->float('discount_price');
            $table->string('image');
            $table->timestamps();
        });
    }


    public function down() {
        Schema::drop('product_colors_sizes');
    }

}
