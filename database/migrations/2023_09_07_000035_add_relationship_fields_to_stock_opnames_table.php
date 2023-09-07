<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStockOpnamesTable extends Migration
{
    public function up()
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_8961303')->references('id')->on('products');
        });
    }
}
