<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToSectionsTable extends Migration {

    public function up() {
        Schema::table('sections', function (Blueprint $table) {
            $table->tinyInteger('status')->after('name_en')->defult(1);
        });
    }

    public function down() {
        
    }

}
