<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('blocks', function (Blueprint $table) {

          $table->increments('id');

          $table->string('title');

          $table->text('description')->nullable();

          $table->boolean('active')->default(true);

          $table->string('image_thumbnail')->nullable();

          $table->string('image')->nullable();

          $table->string('image_link')->nullable();

          $table->string('image_alt')->nullable();

          $table->string('image_position',50)->nullable();

          $table->string('btn_text')->nullable();

          $table->string('btn_class')->nullable();

          $table->string('btn_link')->nullable();

          $table->string('btn_position',50)->nullable();

          $table->unsignedInteger('parent_id')->nullable();

          $table->enum('type',['left','right','center'])->default('center');

          $table->string('video')->nullable();

          $table->enum('video_source',['local','vimeo','youtube'])->default('vimeo');

          $table->string('video_position',50)->nullable();

          $table->string('map_url')->nullable();

          $table->string('map_position',50)->nullable();

          $table->tinyInteger('order')->nullable();

          $table->unsignedInteger('layout_id');

          $table->unsignedInteger('page_id');

          $table->foreign('layout_id')->references('id')->on('block_layouts')->onDelete('cascade');

          $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

          $table->timestamps();
          
          $table->softDeletes();

        });

        Schema::table('blocks',function(Blueprint $table){
          $table->foreign('parent_id')
          ->references('id')
          ->on('blocks')
          ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('blocks');
    }
}
