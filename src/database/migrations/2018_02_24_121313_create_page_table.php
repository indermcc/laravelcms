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

          $table->text('description')->nullable();

          $table->string('meta_title')->nullable();

          $table->text('meta_description')->nullable();

          $table->string('banner')->nullable();

          $table->unsignedInteger('layout_id');

          $table->boolean('active')->default(true);

          $table->timestamps();

          $table->softDeletes();

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
