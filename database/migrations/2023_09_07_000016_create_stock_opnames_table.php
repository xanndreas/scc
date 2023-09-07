<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOpnamesTable extends Migration
{
    public function up()
    {
        Schema::create('stock_opnames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('notes')->nullable();
            $table->integer('quantity');
            $table->string('types');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
