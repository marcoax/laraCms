<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtitleAbstractToArticleTranslationsTable extends Migration
{
    public function up()
    {
        Schema::table('article_translations', function (Blueprint $table) {

            //
            $table->string('subtitle')->nullable()->after('title');
            $table->string('intro')->nullable()->after('subtitle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_translations', function (Blueprint $table) {
            //
            $table->dropColumn('subtitle');
            $table->dropColumn('intro');
        });
    }
}
