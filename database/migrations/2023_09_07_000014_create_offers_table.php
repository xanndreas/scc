<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->decimal('grand_total', 15, 2);
            $table->date('offering_expired_date');
            $table->string('offering_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
