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
        Schema::create('projects_planning', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->default(null);
            $table->dateTime('sale_start');
            $table->dateTime('redaction_date');
            $table->dateTime('adverts_date');
            $table->dateTime('printer_date');
            $table->dateTime('distribution_date');
            $table->dateTime('appearance_date');
            $table->dateTime('sale_started');
            $table->dateTime('redaction_received');
            $table->dateTime('adverts_received');
            $table->dateTime('printer_received');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_planning');
    }
};
