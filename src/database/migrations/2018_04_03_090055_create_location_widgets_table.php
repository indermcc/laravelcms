<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_widgets', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('row_location_id');

            $table->unsignedInteger('widget_id');

            $table->tinyInteger('order')->default(0);

            $table->text('design_options')->nullable();

            $table->foreign('row_location_id')
            ->references('id')
            ->on('row_locations')
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
        Schema::dropIfExists('location_widgets');
    }
}
