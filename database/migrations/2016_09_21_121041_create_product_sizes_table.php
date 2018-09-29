<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizesTable extends Migration
{
    public function up() {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('size_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('product_sizes');
    }
}
