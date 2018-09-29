<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIDToAddressesTable extends Migration
{
    public function up() {
        Schema::table('addresses', function (Blueprint $table) {
            $table->integer('user_id')->after('id');
        });
    }
    public function down() {
        
    }
}
