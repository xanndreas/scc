<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleContentsTable extends Migration
{
    public function up()
    {
        Schema::create('article_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('page_text');
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
