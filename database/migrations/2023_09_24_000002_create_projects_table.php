
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
            $table->string('name');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('layout_id')->nullable();
            $table->foreignId('tax_id')->nullable();
            $table->foreignId('publisher_id')->nullable();
            $table->string('title')->nullable();
            $table->string('designer')->nullable();
            $table->string('printer')->nullable();
            $table->string('client')->nullable();
            $table->string('distribution')->nullable();
            $table->string('release_name');
            $table->string('edition_name');
            $table->string('print_edition');
            $table->string('paper_format');
            $table->integer('pages_redaction');
            $table->integer('pages_adverts');
            $table->integer('pages_total')->nullable();
            $table->string('paper_type_cover');
            $table->string('paper_type_interior');
            $table->string('color_cover');
            $table->string('color_interior');
            $table->integer('ledger')->nullable();
            $table->integer('journal')->nullable();
            $table->integer('department');
            $table->string('year')->nullable();
            $table->double('revenue_goals');
            $table->longText('comments')->nullable();
            $table->softDeletes();
            $table->date('deactivated_at')->nullable()->default(null);
            $table->double('pages_sold')->nullable()->default(null);
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
