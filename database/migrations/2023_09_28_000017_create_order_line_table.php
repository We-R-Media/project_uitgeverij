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
        Schema::create('orders_lines', function (Blueprint $table) {
            $table->id('order_line_id');

            $table->unsignedBigInteger('order_number');
            $table->foreign('order_number')->references('order_number')->on('order_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_lines');
    }
};
