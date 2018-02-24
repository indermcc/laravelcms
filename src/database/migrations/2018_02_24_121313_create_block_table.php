<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('blocks', function (Blueprint $table) {

          $table->increments('id');

          $table->string('title');

          $table->text('description')->nullable();

          $table->string('file');

          $table->unsignedInteger('layout_id');

          $table->tinyInteger('order');

          $table->timestamps();

          $table->foreign('layout_id')
          ->references('id')
          ->on('block_layouts')
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
      Schema::dropIfExists('blocks');
    }
}
