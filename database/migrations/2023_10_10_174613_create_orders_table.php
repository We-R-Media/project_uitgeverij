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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('order_date');
            $table->foreignID('user_id')->nullable();
            $table->foreignID('project_id')->nullable();
            $table->foreignID('advertiser_id')->nullable();
            $table->foreignID('contact_id')->nullable();
            $table->double('order_total_price');
            $table->string('validation_token')->unique();
            $table->string('order_method_approval')->nullable()->default(null);
            $table->string('order_method_invoice')->nullable()->default(null);
            $table->string('order_file')->nullable()->default(null);
            $table->string('order_file_2')->nullable()->default(null);
            $table->dateTime('approved_at')->nullable()->default(null);
            $table->dateTime('deactivated_at')->nullable()->default(null);
            $table->dateTime('email_sent_at')->nullable()->default(null);
            $table->dateTime('material_received_at')->nullable()->default(null);
            $table->text('comment_confirmation')->nullable();
            $table->text('comment_facturation')->nullable();
            $table->text('comment_reference')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
