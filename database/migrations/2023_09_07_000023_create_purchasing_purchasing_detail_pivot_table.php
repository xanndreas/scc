<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingPurchasingDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('purchasing_purchasing_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('purchasing_id');
            $table->foreign('purchasing_id', 'purchasing_id_fk_8961292')->references('id')->on('purchasings')->onDelete('cascade');
            $table->unsignedBigInteger('purchasing_detail_id');
            $table->foreign('purchasing_detail_id', 'purchasing_detail_id_fk_8961292')->references('id')->on('purchasing_details')->onDelete('cascade');
        });
    }
}
