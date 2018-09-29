<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

    public function up() {
        Schema::create('Orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('shipping_id');
            $table->string('status');
            $table->string('payment_method');
            $table->float('total_price');
            $table->float('discount_price')->default(0);
            $table->integer('gift');
            $table->text('gift_text');
            $table->boolean('fastCharge');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('Orders');
    }

}
