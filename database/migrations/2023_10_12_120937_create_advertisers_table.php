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
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
             $table->string('title')->nullable();
            // $table->foreignId('contact_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone_mobile')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('po_box')->nullable();
            $table->double('credit_limit');
            $table->string('province')->nullable();
            $table->longText('comments')->nullable();
            $table->date('deactivated_at')->nullable();
            $table->date('blacklisted_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisers');
    }
};
