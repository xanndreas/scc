<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOfferDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('offer_details', function (Blueprint $table) {
            $table->unsignedBigInteger('supply_id')->nullable();
            $table->foreign('supply_id', 'supply_fk_8970719')->references('id')->on('supplies');
        });
    }
}
