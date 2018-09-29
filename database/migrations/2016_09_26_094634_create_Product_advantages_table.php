<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAdvantagesTable extends Migration
{
    public function up() {
        Schema::create('product_advantages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('feature_id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('value_ar');
            $table->string('value_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('product_advantages');
    }
}
