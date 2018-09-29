<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChargeValueToOrdersTable extends Migration {

    public function up() {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('charge_value')->after('discount_price');
        });
    }

    public function down() {
        
    }

}
