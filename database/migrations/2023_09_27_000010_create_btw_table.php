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
        Schema::create('btw_groups', function (Blueprint $table) {
            $table->id();
            $table->char('btw_country', 3);
            $table->integer('btw_zero');
            $table->integer('btw_low');
            $table->integer('btw_high');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('btw_groups');
    }
};
