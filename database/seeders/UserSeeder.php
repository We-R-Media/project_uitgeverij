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


        $supervisorPreview = User::factory()->create([
            'first_name' => 'Annette',
            'initial' => 'A.',
            'last_name' => 'Duinkerken',
            'email' => 'administratie@conceptplusbv.nl',
            'password' => bcrypt('administratie2'),
            'gender' => 'female',
            'role' => 'supervisor',
        ]);

        $sellerPreview = User::factory()->create([
            'first_name' => 'Niels',
            'initial' => 'N.',
            'last_name' => 'Rol',
            'email' => 'verkoper@conceptplusbv.nl',
            'password' => bcrypt('verkoper2'),
            'gender' => 'male',
            'role' => 'seller',
        ]);

        

        $users = User::factory()
            ->count(10)
            ->state(['role' => 'seller'])
            ->create();
    
        $users = User::factory()
            ->count(10)
            ->state(['role' => 'supervisor'])
            ->create();
        
        $users = User::factory()
            ->count(10)
            ->state(['role' => 'admin'])
            ->create();
    }
}
