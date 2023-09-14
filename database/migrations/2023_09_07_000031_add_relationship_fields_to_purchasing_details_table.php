<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchasingDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('purchasing_details', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_8961255')->references('id')->on('products');
        });
    }
}
