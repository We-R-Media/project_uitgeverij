<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_total', function (Blueprint $table) {

            $table->id();
            $table->foreignId('advertiser_id');
            $table->foreignId('user_id');
            $table->foreignId('contact_id');
            
            // $table->unsignedBigInteger('advertiser_id');
            // $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('cascade');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->unsignedBigInteger('contact_id');
            // $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_total');
    }
};