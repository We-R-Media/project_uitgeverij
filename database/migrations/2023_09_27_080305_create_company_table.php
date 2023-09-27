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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->integer('contact_id');
            $table->string('company_name')->unique();
            $table->boolean('company_isactive');
            $table->string('mailbox');
            $table->string('postalcode');
            $table->string('city');
            $table->string('province');
            $table->integer('phone_mobile')->unique();
            $table->integer('phone_number')->unique();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
