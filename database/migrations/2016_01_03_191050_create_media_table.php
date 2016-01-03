<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_category_id')->unsigned();
            $table->morphs('model');
            $table->string('collection_name');
            $table->string('name');
            $table->text('description');
            $table->string('file_name');
            $table->string('file_ext');
            $table->string('disk');
            $table->unsignedInteger('size');
            $table->text('manipulations');
            $table->tinyInteger('pub')->default(1)->nullable();
            $table->unsignedInteger('sort')->nullable();
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
        Schema::drop('media');
    }
}
