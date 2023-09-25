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
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('company_name', 25);
            $table->enum('existing_relationship', ['yes', 'no'])->default('yes');
            $table->string('mailbox', 25);
            $table->string('postal_code', 8);
            $table->string('city', 25);
            $table->integer('phone_mobile');
            $table->integer('phone_number');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relations_table');
    }
};
