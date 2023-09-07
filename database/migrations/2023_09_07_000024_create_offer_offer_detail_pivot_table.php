<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferOfferDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('offer_offer_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id', 'offer_id_fk_8961280')->references('id')->on('offers')->onDelete('cascade');
            $table->unsignedBigInteger('offer_detail_id');
            $table->foreign('offer_detail_id', 'offer_detail_id_fk_8961280')->references('id')->on('offer_details')->onDelete('cascade');
        });
    }
}
