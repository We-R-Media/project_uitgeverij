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
            $table->string('title')->unique()->nullable();
            $table->foreignID('advertiser_id');
            $table->datetime('invoice_date');
            $table->enum('post_method', ['mail','post']);
            $table->datetime('first_reminder')->nullable();
            $table->datetime('second_reminder')->nullable();
            $table->datetime('third_reminder')->nullable();
            $table->datetime('payed_at')->nullable();;
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
