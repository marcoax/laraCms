<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsActiveToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('domain', 255);
            $table->integer('id_parent');
            $table->integer('id_template');
            $table->string('title', 255);
            $table->text('description');
            $table->string('slug')->nullable();
            $table->integer('sort');
            $table->tinyInteger('pub')->default(1)->nullable();
            $table->tinyInteger('top_menu')->default(1)->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
