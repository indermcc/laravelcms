<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('widget_attributes', function (Blueprint $table) {

        $table->increments('id');

        $table->string('name');

        $table->string('key')->unique();

        $table->enum('type',['varchar','text','file'])->default('varchar');

        $table->boolean('haveSingleValue')->default(true);

        $table->unsignedInteger('widget_id');

        $table->boolean('required')->default(false);

        $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('widget_attributes');
        Schema::enableForeignKeyConstraints();
    }
}
