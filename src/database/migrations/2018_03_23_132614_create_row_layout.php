<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowLayout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_layouts',function(Blueprint $table){

          $table->increments('id');

          $table->string('title');

          $table->text('layout');

          $table->tinyInteger('order')->default(0);

          $table->tinyInteger('rows');

          $table->string('col1_class',50)->nullable();

          $table->string('col2_class',50)->nullable();

          $table->string('col3_class',50)->nullable();

          $table->string('col4_class',50)->nullable();

          $table->timestamps();

          $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('row_layouts');
    }
}
