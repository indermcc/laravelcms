<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('widgets', function (Blueprint $table) {

        $table->increments('id');

        $table->string('name');

        // $table->string('key')->unique();

        $table->string('layout');

        $table->text('description')->nullable();

        $table->text('design_options')->nullable();

        $table->boolean('active')->default(true);

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
        Schema::dropIfExists('widgets');
        Schema::enableForeignKeyConstraints();
    }
}
