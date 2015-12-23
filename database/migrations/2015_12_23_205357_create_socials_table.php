<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 255);
            $table->text('description');
            $table->string('icon')->nullable();
            $table->string('image');
            $table->string('link')->nullable();
            $table->integer('sort');
            $table->tinyInteger('is_active')->default(1)->nullable();
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
        Schema::drop('socials');
    }
}
