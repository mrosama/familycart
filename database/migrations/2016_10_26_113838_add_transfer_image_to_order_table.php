<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferImageToOrderTable extends Migration {

    public function up() {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('transfer_image')->nullable()->after('payment_method');
        });
    }

    public function down() {
        
    }

}
