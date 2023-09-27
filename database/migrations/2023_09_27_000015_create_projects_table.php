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
            $table->string('project_id')->primary()->unique();

            $table->string('format_id');
            $table->foreign('format_id')->references('group_name')->on('format_group');

            $table->string('layout_id');
            $table->foreign('layout_id')->references('layout_name')->on('layouts');

            $table->string('designer_id');
            $table->foreign('designer_id')->references('company_name')->on('designer');

            $table->string('printer_id');
            $table->foreign('printer_id')->references('company_name')->on('printer');
      
            $table->string('client_id');
            $table->foreign('client_id')->references('company_name')->on('clients');

            $table->string('distribution_id');
            $table->foreign('distribution_id')->references('company_name')->on('distribution_agency');
            
            $table->string('btw_country_id', 3);
            $table->foreign('btw_country_id')->references('btw_country_id')->on('btw_groups');

            $table->string('release_name');
            $table->string('edition_name');
            $table->string('print_edition');
            $table->integer('amount_pages_redaction');
            $table->integer('amount_pages_adverts');
            $table->integer('amount_pages_total');
            $table->string('paper_type_cover');
            $table->string('paper_type_interior');
            $table->string('color_cover');
            $table->string('color_interior');
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
