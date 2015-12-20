<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMediaToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
        public function up()
    {
       Schema::table('articles', function($table) {
            $table->string('doc')->after('slug');
            $table->string('image')->after('doc');
			$table->string('banner')->after('image');
			$table->string('link')->after('banner');
            
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}
