<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('value');
            $table->string('domain');
            $table->integer('sort');
            $table->tinyInteger('pub')->default(1)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();;
        });

        Schema::create('domain_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->integer('created_by');
            $table->integer('update_by');
            $table->timestamps();
            $table->unique(['domain_id','locale']);
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('domains');
        Schema::drop('domain_translations');
    }
}
