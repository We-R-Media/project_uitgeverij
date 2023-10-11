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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id', 25)->primary()->unique();

            $table->unsignedBigInteger('format_id')->nullable();
            $table->foreign('format_id')->references('id')->on('format_group')->onDelete('cascade');

            $table->unsignedBigInteger('layout_id')->nullable();
            $table->foreign('layout_id')->references('id')->on('layouts')->onDelete('cascade');

            $table->unsignedBigInteger('designer_id')->nullable();
            $table->foreign('designer_id')->references('id')->on('designer')->onDelete('cascade');

            $table->unsignedBigInteger('printer_id')->nullable();
            $table->foreign('printer_id')->references('id')->on('printer')->onDelete('cascade');
      
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('distribution_id')->nullable();
            $table->foreign('distribution_id')->references('id')->on('distribution_agency')->onDelete('cascade');
            
            $table->unsignedBigInteger('btw_country_id')->nullable();
            $table->foreign('btw_country_id')->references('id')->on('btw_groups')->onDelete('cascade');

            $table->string('release_name');
            $table->string('edition_name');
            $table->string('print_edition');
            $table->integer('pages_redaction');
            $table->integer('pages_adverts');
            $table->integer('pages_total')->nullable();
            $table->string('paper_type_cover');
            $table->string('paper_type_interior');
            $table->string('color_cover');
            $table->string('color_interior');
            $table->integer('ledger');
            $table->integer('journal');
            $table->integer('department');
            $table->date('year');
            $table->double('revenue_goals');
            $table->text('comments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
