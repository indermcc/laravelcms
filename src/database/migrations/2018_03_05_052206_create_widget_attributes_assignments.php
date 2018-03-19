<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetAttributesAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('widget_attributes_assignment', function (Blueprint $table) {

        $table->increments('id');

        $table->unsignedInteger('widget_id');

        $table->unsignedInteger('widget_attribute_id');

        $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');

        $table->foreign('widget_attribute_id')->references('id')->on('widget_attributes')->onDelete('cascade');

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
        Schema::dropIfExists('widget_attributes_assignment');
        Schema::enableForeignKeyConstraints();
    }
}
