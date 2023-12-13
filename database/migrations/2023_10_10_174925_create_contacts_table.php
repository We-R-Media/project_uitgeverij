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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertiser_id')->nullable();
            $table->string('title')->nullable();
            $table->enum('salutation', ['Dhr.', 'Mw.'])->nullable();
            $table->char('initial')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('preposition')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('role')->nullable();
            $table->longText('comments')->nullable();
            $table->timestamp('deactivated_at')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
