<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSmallMeduimImageToProductImagesTable extends Migration {

    public function up() {
        Schema::table('product_images', function (Blueprint $table) {
            $table->string('small_image')->after('product_id');
            $table->string('meduim_image')->after('small_image');
        });
    }

    public function down() {
        //
    }

}
