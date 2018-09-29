<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityToProductsTable extends Migration
{
    public function up() {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('quantity')->after('discount_price');
        });
    }

    public function down() {
        //
    }
}
