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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->foreignId('order_line_id')->nullable()->default(null);
            $table->foreignId('order_id')->nullable()->default(null);
            $table->text('description');
            $table->dateTime('solved_at')->nullable()->default(null);
            $table->dateTime('complaint_date')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
