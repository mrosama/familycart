<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrivacyToSettingsTable extends Migration {

    public function up() {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('privacy')->after('shipping_return_en');
            $table->text('privacy_en')->after('privacy');
        });
    }

    public function down() {
        
    }

}
