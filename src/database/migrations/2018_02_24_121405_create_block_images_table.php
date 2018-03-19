<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_images', function (Blueprint $table) {

          $table->increments('id');

          $table->string('image');

          $table->tinyInteger('position');

          $table->unsignedInteger('block_id');

          $table->foreign('block_id')
          ->references('id')
          ->on('blocks')
          ->onDelete('cascade')
          ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('block_images');
    }
}
