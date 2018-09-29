<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentGiftChargeToProductsTable extends Migration {

    public function up() {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('payment_on_delivery')->after('guarantee')->default(1);
            $table->integer('gift_wrapping')->after('payment_on_delivery')->default(1);
            $table->integer('free_charge')->after('gift_wrapping')->default(1);
        });
    }

    public function down() {
        //
    }

}
