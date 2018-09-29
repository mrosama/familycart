<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration {

    public function up() {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('address');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('mobile', 20);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('shippings');
    }

}
