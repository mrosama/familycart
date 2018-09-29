<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkToSlidersTable extends Migration {

    public function up() {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('link')->after('image');
            $table->dropColumn('title');
            $table->dropColumn('title_en');
            $table->dropColumn('desc');
            $table->dropColumn('desc_en');
        });
    }

    public function down() {
        
    }

}
