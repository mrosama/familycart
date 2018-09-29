<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinksToBestOffersTable extends Migration
{
    public function up() {
        Schema::table('best_offers', function (Blueprint $table) {
            $table->string('main_link')->after('main_img');
            $table->string('first_link')->after('first_img');
            $table->string('second_link')->after('second_img');
            $table->string('third_link')->after('third_img');
            $table->string('fourth_link')->after('fourth_img');
        });
    }
    public function down() {
        
    }
}
