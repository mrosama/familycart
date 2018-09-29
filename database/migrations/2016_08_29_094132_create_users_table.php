<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type' , 20);
            $table->string('email');
            $table->string('image');
            $table->string('password');
            $table->string('sex');
            $table->string('birthdate');
            $table->timestamps();
        });
    }

 
    public function down() {
        Schema::drop('users');
    }
}
