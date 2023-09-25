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
            $table->increments('project_id');
            $table->string('format_group_id');
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
            $table->string('designer');
            $table->string('printer');
            $table->string('distribution_agency');
            $table->string('client');
            $table->integer('ledger');
            $table->integer('journal');
            $table->integer('department');
            $table->integer('layout_id');
            $table->date('year');
            $table->double('revenue_goals');
            $table->text('comments');
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
