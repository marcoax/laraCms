<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain', 255);
            $table->date('date', 255);


            $table->string('title', 255);
            $table->text('description');
            $table->string('subtitle')->nullable();
            $table->string('intro')->nullable();
            $table->string('abstract')->nullable;

            $table->string('slug')->nullable();
            $table->string('doc');
            $table->string('image');
            $table->string('banner');
            $table->string('link');
            $table->integer('sort');

            $table->tinyInteger('pub')->default(1)->nullable();
            $table->integer('created_by');
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
        Schema::drop('news');
    }
}
