<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShippingReturnToSettingsTable extends Migration {

    public function up() {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('shipping_return')->after('agreement_en');
            $table->text('shipping_return_en')->after('shipping_return');
        });
    }

    public function down() {
        //
    }

}
