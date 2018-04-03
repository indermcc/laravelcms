<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('row_pages',function(Blueprint $table){

        $table->increments('id');

        $table->unsignedInteger('row_id');

        $table->unsignedInteger('page_id');

        $table->tinyInteger('order')->default(0);

        $table->timestamps();

        $table->softDeletes();

        $table->foreign('row_id')
        ->references('id')
        ->on('row_layouts')
        ->onDelete('cascade')
        ;

        $table->foreign('page_id')
        ->references('id')
        ->on('pages')
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
      Schema::dropIfExists('row_pages');
    }
}
