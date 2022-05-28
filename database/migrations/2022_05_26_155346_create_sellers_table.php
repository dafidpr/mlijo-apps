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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('store_name');
            $table->string('store_slug')->unique();
            $table->string('store_slogan');
            $table->string('store_description')->nullable();
            $table->string('store_profile_path')->nullable()->default('default_store.png');
            $table->string('store_cover_path')->nullable()->default('default_store.png');
            $table->string('store_phone_number')->unique();
            $table->string('store_email')->unique();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->enum('status', ['open', 'close', 'banned'])->default('open');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
};
