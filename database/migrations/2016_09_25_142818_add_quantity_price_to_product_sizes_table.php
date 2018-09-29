<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityPriceToProductSizesTable extends Migration
{
    public function up() {
        Schema::table('product_sizes', function (Blueprint $table) {
            $table->string('quantity')->after('size_id');
            $table->float('original_price')->after('quantity');
            $table->float('discount_price')->after('original_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    }
}
