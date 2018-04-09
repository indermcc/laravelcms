<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_locations', function (Blueprint $table) {

            $table->increments('id');

            $table->tinyInteger('loc_id');

            $table->tinyInteger('order')->default(0);

            $table->unsignedInteger('row_page_id');

            $table->foreign('row_page_id')
            ->references('id')
            ->on('row_pages')
            ->onDelete('cascade')
            ;

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
        Schema::dropIfExists('row_locations');
    }
}
