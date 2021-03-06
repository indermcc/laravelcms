<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_layouts', function (Blueprint $table) {

          $table->increments('id');

          $table->string('name');

          $table->string('file');

          $table->timestamps();

        });


        Schema::create('block_layouts', function (Blueprint $table) {

          $table->increments('id');

          $table->string('name');

          $table->string('file');

          $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::disableForeignKeyConstraints();
      Schema::dropIfExists('page_layouts');
      Schema::dropIfExists('block_layouts');
      Schema::enableForeignKeyConstraints();
    }
}
