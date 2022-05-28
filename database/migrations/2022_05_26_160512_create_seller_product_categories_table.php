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
        Schema::create('seller_product_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_category_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->foreign('seller_category_id')->references('id')->on('seller_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_product_categories');
    }
};
