<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create 10 user records using the UserFactory
        $user = User::factory()->count(4)->create();
    }
}
