<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityNameImageToProductColorsTable extends Migration {

    public function up() {
        Schema::table('product_colors', function (Blueprint $table) {
            $table->integer('quantity')->after('color_id');
            $table->string('name_ar')->after('quantity');
            $table->string('name_en')->after('name_ar');
            $table->string('image')->after('name_en');
        });
    }

    public function down() {
        //
    }

}
