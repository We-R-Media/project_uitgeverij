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
            $table->id();
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
            $table->softDeletes();
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
