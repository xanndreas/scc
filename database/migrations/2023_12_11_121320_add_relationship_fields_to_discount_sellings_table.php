<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('discount_sellings', function (Blueprint $table) {
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id', 'discount_id_fk_1231291')->references('id')->on('discounts')->onDelete('cascade');

            $table->unsignedBigInteger('selling_id');
            $table->foreign('selling_id', 'selling_id_fk_1221291')->references('id')->on('sellings')->onDelete('cascade');
        });
    }
};
