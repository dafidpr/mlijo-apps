<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discount_product_id');
            $table->unsignedBigInteger('product_variant_detail_id')->nullable();
            $table->double('starting_price');
            $table->double('price_discount');
            $table->double('discount_percent');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('discount_product_id')->references('id')->on('discount_products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_variant_detail_id')->references('id')->on('product_variant_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_product_details');
    }
};
