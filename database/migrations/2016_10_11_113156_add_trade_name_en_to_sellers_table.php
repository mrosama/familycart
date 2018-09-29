<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTradeNameEnToSellersTable extends Migration {

    public function up() {
        Schema::table('sellers', function (Blueprint $table) {
            $table->string('trade_name_en')->after('trade_name');
        });
    }

    public function down() {
        
    }

}
