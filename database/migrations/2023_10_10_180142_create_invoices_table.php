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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertiser_id')->default(1);
            $table->string('invoice_number')->nullable();
            $table->string('title')->nullable();
            $table->datetime('invoice_date')->nullable();
            $table->enum('post_method', ['mail','post']);
            $table->datetime('first_reminder')->nullable();
            $table->datetime('second_reminder')->nullable();
            $table->datetime('third_reminder')->nullable();
            $table->datetime('payed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
