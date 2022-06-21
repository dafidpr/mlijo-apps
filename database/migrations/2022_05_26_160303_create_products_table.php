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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('product_sub_category_id');
            $table->string('name');
            $table->string('summary');
            $table->text('description');
            $table->string('thumbnail');
            $table->string('video')->nullable();
            $table->integer('min_order')->default(1);
            $table->double('price')->default(0);
            $table->integer('stock')->default(0);
            $table->string('sku')->nullable();
            $table->integer('expired');
            $table->enum('weight_unit', ['gr', 'kg']);
            $table->double('weight');
            $table->double('long_size');
            $table->double('width_size');
            $table->double('height_size');
            $table->string('slug')->unique();
            $table->string('keywords')->nullable();
            $table->boolean('have_variant')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_sub_category_id')->references('id')->on('product_sub_categories')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
