<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_values', function (Blueprint $table) {

          $table->increments('id');

          $table->unsignedInteger('location_widget_id');

          $table->unsignedInteger('attribute_id');

          $table->string('value_string')->nullable();

          $table->string('value_text')->nullable();

          $table->foreign('attribute_id')
          ->references('id')
          ->on('widget_attributes')
          ->onDelete('cascade')
          ;

          $table->foreign('location_widget_id')
          ->references('id')
          ->on('location_widgets')
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
        Schema::dropIfExists('widget_values');
    }
}
