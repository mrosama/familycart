<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

    public function up() {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('logo');
            $table->string('phone', 20);
            $table->string('mobile', 20);
            $table->string('fax', 20);
            $table->string('email');
            $table->string('address');
            $table->string('address_en');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('g_plus');
            $table->string('instegram');
            $table->string('lat');
            $table->string('long');
            $table->text('desc');
            $table->text('desc_en');
            $table->text('agreement');
            $table->text('agreement_en');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('settings');
    }

}
