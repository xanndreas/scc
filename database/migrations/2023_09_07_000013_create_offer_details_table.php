<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('offer_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->decimal('price_offer', 15, 2);
            $table->decimal('price_deal', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
