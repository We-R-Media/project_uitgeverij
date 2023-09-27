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
        
        Schema::table('contacts', function(Blueprint $table) {
            $table->string('full_name')->nullable()->unique();
        });

        DB::unprepared('
            CREATE TRIGGER full_name_trigger 
            BEFORE INSERT ON contacts
            FOR EACH ROW
            BEGIN
                SET NEW.full_name = CONCAT(NEW.first_name, " ", NEW.last_name);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS full_name_trigger');
    }
};
