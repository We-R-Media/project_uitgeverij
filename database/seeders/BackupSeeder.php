<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = \file_get_contents(public_path('storage/sql/uitgeverij_db.sql'));

        DB::unprepared($sql);
    }
}
