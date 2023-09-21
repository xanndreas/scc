<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('notes');
            $table->decimal('value', 15, 2);
            $table->bigInteger('model_id');
            $table->string('model_type');
            $table->string('transaction_batch');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
