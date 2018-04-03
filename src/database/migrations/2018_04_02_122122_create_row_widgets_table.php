<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_widgets', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('page_row_id');

            $table->unsignedInteger('widget_id');

            // location in row
            $table->tinyInteger('location_id');

            $table->text('design_options')->nullable();

            $table->foreign('page_row_id')
            ->references('id')
            ->on('row_pages')
            ->onDelete('cascade')
            ;

            $table->foreign('widget_id')
            ->references('id')
            ->on('widgets')
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
        Schema::dropIfExists('row_widgets');
    }
}
