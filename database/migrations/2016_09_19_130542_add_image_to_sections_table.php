<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToSectionsTable extends Migration
{
    public function up() {
        Schema::table('sections', function (Blueprint $table) {
            $table->string('image')->after('name_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    }
}
