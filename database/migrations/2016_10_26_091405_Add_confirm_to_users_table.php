<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmToUsersTable extends Migration {

    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('confirmed')->default(0)->after('birthdate')->nullable();
            $table->string('confirmation_code')->nullable()->after('confirmed');
        });
    }
    public function down() {
        
    }

}
