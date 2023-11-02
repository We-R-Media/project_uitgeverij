<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $adminUsers = User::factory()->create([
            'email' => 'admin@wermedia.nl',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]);
        $supervisorUsers = User::factory()->create([
            'email' => 'supervisor@wermedia.nl',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'role' => 'supervisor'
        ]);
        $sellerUser = User::factory()->create([
            'email' => 'seller@wermedia.nl',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'role' => 'seller'
        ]);

        // Create 10 user records using the UserFactory
        $users = User::factory()
            ->count(8)
            ->create();
    }
}
