<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->string('phone');
            $table->string('type');
            $table->string('pos_code');
            $table->string('enterprises')->nullable();
            $table->string('npwp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
