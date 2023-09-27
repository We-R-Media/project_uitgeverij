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
            $table->string('project_id', 25)->primary()->unique();

            $table->unsignedBigInteger('format_id');
            $table->foreign('format_id')->references('group_id')->on('format_group')->onDelete('cascade');

            $table->unsignedBigInteger('layout_id');
            $table->foreign('layout_id')->references('layout_id')->on('layouts')->onDelete('cascade');

            $table->unsignedBigInteger('designer_id');
            $table->foreign('designer_id')->references('designer_id')->on('designer')->onDelete('cascade');

            $table->unsignedBigInteger('printer_id');
            $table->foreign('printer_id')->references('printer_id')->on('printer')->onDelete('cascade');
      
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('distribution_id');
            $table->foreign('distribution_id')->references('distribution_agency_id')->on('distribution_agency')->onDelete('cascade');
            
            $table->unsignedBigInteger('btw_country_id');
            $table->foreign('btw_country_id')->references('btw_id')->on('btw_groups')->onDelete('cascade');

            $table->string('release_name', 25);
            $table->string('edition_name', 25);
            $table->string('print_edition', 25);
            $table->integer('pages_redaction');
            $table->integer('pages_adverts');
            $table->integer('pages_total')->nullable();
            $table->string('paper_type_cover', 25);
            $table->string('paper_type_interior', 25);
            $table->string('color_cover', 25);
            $table->string('color_interior', 25);
            $table->integer('ledger');
            $table->integer('journal');
            $table->integer('department');
            $table->date('year');
            $table->double('revenue_goals');
            $table->text('comments');
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
