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
        Schema::create('order_total', function (Blueprint $table) {

            $table->id('order_number');

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('contact_id')->on('contacts')->onDelete('cascade');


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
