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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignID('project_id')->nullable();
            $table->dateTime('order_date');
            $table->double('order_total_price');
            $table->dateTime('approved_at')->default(null);
            $table->text('comment_confirmation')->nullable();
            $table->text('comment_facturation')->nullable();
            $table->text('comment_reference')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
