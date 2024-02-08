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
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('full_name')->nullable();
            $table->enum('salutation', ['Dhr.', 'Mw.'])->nullable();
            $table->char('initial')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('po_box')->nullable();
            $table->double('credit_limit')->nullable()->default(null);
            $table->string('province')->nullable();
            $table->longText('comments')->nullable();

            $table->string('alt_address_at')->nullable()->default(null);
            $table->string('alt_name')->nullable()->default(null);
            $table->string('alt_email')->nullable()->default(null);
            $table->string('alt_city')->nullable()->default(null);
            $table->string('alt_postal_code')->nullable()->default(null);
            $table->string('alt_province')->nullable()->default(null);
            $table->string('alt_po_box')->nullable()->default(null);

            // $table->dateTime('alt_address_at')->nullable()->default(null);
        
            $table->date('deactivated_at')->nullable()->default(null);
            $table->date('blacklisted_at')->nullable()->default(null);
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
