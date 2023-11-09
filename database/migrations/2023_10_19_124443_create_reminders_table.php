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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('period_first');
            $table->integer('period_second');
            $table->integer('period_third');
            $table->double('administration_cost_first');
            $table->double('administration_cost_second');
            // $table->foreignId('contact_id')->nullable()->onDelete('set null');
            $table->string('contact_debtor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
