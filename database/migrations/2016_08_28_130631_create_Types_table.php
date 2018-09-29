<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
  public function up() {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id');
            $table->integer('branch_id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->timestamps();
        });
    }

 
    public function down() {
        Schema::drop('types');
    }
}
