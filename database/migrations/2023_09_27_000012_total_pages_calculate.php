<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER total_pages_trigger 
        BEFORE INSERT ON projects
        FOR EACH ROW
        BEGIN
            SET NEW.pages_total = NEW.pages_redaction + NEW.pages_adverts;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS total_pages_trigger');
    }
};
