<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail_text')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('whatsapp_text')->nullable();
            $table->string('home_logo_one_info')->nullable();
            $table->string('home_logo_one_description')->nullable();
            $table->string('home_logo_two_info')->nullable();
            $table->string('home_logo_two_description')->nullable();
            $table->string('home_logo_three_info')->nullable();
            $table->string('home_logo_three_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
