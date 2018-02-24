<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

          $table->increments('id');

          $table->string('title');

          $table->text('description');

          $table->string('meta_title');

          $table->text('meta_description');

          $table->string('banner');

          $table->unsignedInteger('layout_id');

          $table->boolean('active');

          $table->timestamps();

          $table->foreign('layout_id')
          ->references('id')
          ->on('page_layouts')
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
      Schema::dropIfExists('pages');
    }
}
