<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WidgetAlteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('widgets',function(Blueprint $table){

          $table->unsignedInteger('category_id');

          $table->foreign('category_id')
          ->references('id')
          ->on('widget_categories')
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
        //
        Schema::table('widgets',function(Blueprint $table) {

          $table->dropForeign('widgets_category_id_foreign');

          $table->dropColumn('category_id');

        });
    }
}
