<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtitleIntroAbstractToArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->string('subtitle')->nullable()->after('title');
            $table->string('intro')->nullable()->after('subtitle');
            $table->string('abstract')->nullable()->after('intro');
            //
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
            $table->dropColumn('subtitle');
            $table->dropColumn('intro');
            $table->dropColumn('abstract');
        });
    }
}
