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
        Schema::create('formats', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('format_title');
            $table->foreignId('project_id')->nullable();
            $table->foreignId('tax_id')->nullable();
            $table->string('size');
            $table->string('measurement')->nullable();
            $table->string('ratio')->nullable();
            $table->double('price')->nullable();
            $table->double('price_with_tax');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formats');
    }
};
