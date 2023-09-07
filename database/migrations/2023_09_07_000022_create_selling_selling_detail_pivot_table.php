<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingSellingDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('selling_selling_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('selling_id');
            $table->foreign('selling_id', 'selling_id_fk_8961291')->references('id')->on('sellings')->onDelete('cascade');
            $table->unsignedBigInteger('selling_detail_id');
            $table->foreign('selling_detail_id', 'selling_detail_id_fk_8961291')->references('id')->on('selling_details')->onDelete('cascade');
        });
    }
}
