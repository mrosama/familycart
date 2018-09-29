<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColorImagesTable extends Migration
{
    public function up() {
        Schema::create('product_color_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_color_id');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('product_color_images');
    }
}
