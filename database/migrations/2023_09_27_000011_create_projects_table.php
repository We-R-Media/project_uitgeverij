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

            $table->string('format_id', 25);
            $table->foreign('format_id')->references('group_name')->on('format_group')->onDelete('cascade');

            $table->string('layout_id', 25);
            $table->foreign('layout_id')->references('layout_name')->on('layouts')->onDelete('cascade');

            $table->string('designer_id', 25);
            $table->foreign('designer_id')->references('company_name')->on('designer')->onDelete('cascade');

            $table->string('printer_id', 25);
            $table->foreign('printer_id')->references('company_name')->on('printer')->onDelete('cascade');
      
            $table->string('client_id', 25);
            $table->foreign('client_id')->references('company_name')->on('clients')->onDelete('cascade');

            $table->string('distribution_id', 25);
            $table->foreign('distribution_id')->references('company_name')->on('distribution_agency')->onDelete('cascade');
            
            $table->string('btw_country_id', 3);
            $table->foreign('btw_country_id')->references('btw_country_id')->on('btw_groups')->onDelete('cascade');

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
