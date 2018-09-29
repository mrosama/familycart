<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaceToSlider extends Migration
{
    public function up() {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('place')->after('id')->default('home');
        });
    }
    public function down() {
        
    }
}
