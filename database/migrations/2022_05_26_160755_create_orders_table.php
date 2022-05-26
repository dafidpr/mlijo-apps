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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('shipping_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('order_code')->unique();
            $table->string('receipt_number')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'canceled', 'fail'])->default('pending');
            $table->double('shipping_total')->default(0);
            $table->double('discount_total')->default(0);
            $table->enum('status_order', ['pending', 'processing', 'shipping', 'delivered', 'canceled', 'done', 'fail'])->default('pending');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
