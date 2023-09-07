<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->integer('stock_minimum');
            $table->decimal('price_buy', 15, 2);
            $table->decimal('price_sell', 15, 2);
            $table->string('packaging_unit')->nullable();
            $table->string('slug')->nullable();
            $table->string('product_code');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
