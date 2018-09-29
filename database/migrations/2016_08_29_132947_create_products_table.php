<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id');
            $table->integer('branch_id');
            $table->integer('type_id');
            $table->integer('brand_id');
            $table->integer('seller_id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('image');
            $table->string('video');
            $table->float('original_price');
            $table->float('discount_price');
            $table->string('duration_charging');
            $table->string('duration_delivery');
            $table->string('guarantee');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->text('details_ar');
            $table->text('details_en');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('products');
    }

}
