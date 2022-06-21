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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('postal_code')->nullable();
            $table->string('address');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('is_default')->default(false);
            $table->enum('address_type', ['personal', 'store']);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
