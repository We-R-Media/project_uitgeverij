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
            $table->timestamp('invoice_date');

            $table->timestamp('first_reminder')->nullable();
            $table->timestamp('second_reminder')->nullable();

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedBigInteger('order_number');
            $table->foreign('order_number')->references('id')->on('order_total');

            $table->enum('send_method', ['mail','post']);

            $table->enum('exhortation', ['yes', 'no'])->default('no');

            $table->integer('payment_condition');
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
