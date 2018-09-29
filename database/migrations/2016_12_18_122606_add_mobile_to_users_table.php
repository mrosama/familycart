<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMobileToUsersTable extends Migration {

    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile' , 20)->after('email');
        });
    }

    public function down() {
        //
    }

}
