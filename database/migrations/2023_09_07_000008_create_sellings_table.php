<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingsTable extends Migration
{
    public function up()
    {
        Schema::create('sellings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_code');
            $table->decimal('grand_total', 15, 2);
            $table->string('notes')->nullable();
            $table->decimal('rounding_cost', 15, 2)->nullable();
            $table->decimal('additional_cost', 15, 2)->nullable();
            $table->decimal('price_discounts', 15, 2)->nullable();
            $table->string('status');
            $table->string('selling_transaction_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
