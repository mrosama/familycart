<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 20)->comment("house Or office");
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('mobile', 20);
            $table->integer('default_shipping')->length(1)->unsigned()->comment('0 => no , 1 => yes');
            $table->integer('default_billing')->length(1)->unsigned()->comment('0 => no , 1 => yes');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('addresses');
    }

}
