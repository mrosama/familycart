<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportQuestionsTable extends Migration
{

    public function up()
    {
        Schema::create('support_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sectionID');
            $table->string('title');
            $table->string('title_en');
            $table->text('details');
            $table->text('details_en');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('support_questions');
    }
}
