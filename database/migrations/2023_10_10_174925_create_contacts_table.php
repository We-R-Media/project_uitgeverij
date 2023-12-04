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
            $table->foreignId('advertiser_id');
            $table->string('title')->nullable();
            $table->enum('salutation', ['Dhr.', 'Mw.']);
            // $table->string('salutation');
            $table->char('initial');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('preposition')->nullable();
            $table->string('email');
            $table->string('phone');
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
