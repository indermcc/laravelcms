<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('widget_varchars', function (Blueprint $table) {

        $table->increments('id');

        $table->unsignedInteger('widget_id');

        $table->unsignedInteger('widget_attribute_id');

        $table->string('value')->nullable();

        $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');

        $table->foreign('widget_attribute_id')->references('id')->on('widget_attributes')->onDelete('cascade');

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
        Schema::dropIfExists('widget_varchars');
        Schema::enableForeignKeyConstraints();
    }
}
