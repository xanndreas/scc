<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_key');
            $table->string('model_name');
            $table->string('types');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
