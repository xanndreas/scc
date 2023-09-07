<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('purchasing_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('subtotal', 15, 2);
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
