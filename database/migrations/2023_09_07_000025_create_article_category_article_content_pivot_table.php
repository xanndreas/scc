<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryArticleContentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('article_category_article_content', function (Blueprint $table) {
            $table->unsignedBigInteger('article_content_id');
            $table->foreign('article_content_id', 'article_content_id_fk_8961395')->references('id')->on('article_contents')->onDelete('cascade');
            $table->unsignedBigInteger('article_category_id');
            $table->foreign('article_category_id', 'article_category_id_fk_8961395')->references('id')->on('article_categories')->onDelete('cascade');
        });
    }
}
