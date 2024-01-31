<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BackupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sqlFilePath = public_path('storage/sql/uitgeverij_db_original.sql');
        $chunkSize = 10 * 1024 * 1024; // 10 MB chunks

        $sql = file_get_contents($sqlFilePath);
        $queries = explode(';', $sql);

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach (array_chunk($queries, $chunkSize) as $chunk) {
            foreach ($chunk as $query) {
                if (trim($query) !== '') {
                    $this->truncateTableIfExists('telescope_entries');
                    DB::unprepared($query);
                }
            }
        }

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function truncateTableIfExists($tableName)
    {
        if (Schema::hasTable($tableName)) {
            // Truncate the table if it exists
            DB::table($tableName)->truncate();
        }
    }
}
