<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricesToProductColorsTable extends Migration
{
    public function up() {
        Schema::table('product_colors', function (Blueprint $table) {
            $table->float('original_price')->after('name_en');
            $table->float('discount_price')->after('original_price');
        });
    }

    public function down() {
        //
    }

}
