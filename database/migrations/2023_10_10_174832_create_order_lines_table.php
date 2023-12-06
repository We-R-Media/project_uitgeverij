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
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
             $table->string('title')->nullable();
            $table->foreignId('order_id')->nullable();
            $table->double('base_price')->nullable();
            $table->double('price_with_discount')->nullable();
            $table->integer('discount')->nullable();
            $table->boolean('material');
            $table->datetime('invoiced_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_lines');
    }
};
