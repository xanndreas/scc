<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity_needs');
            $table->decimal('initial_price', 15, 2);
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
