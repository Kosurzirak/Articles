<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Premium User',
                'email' => 'test@example.com',
                'is_premium' => true,
                'password' => "test"
            ],
            [
                'name' => 'Default user',
                'email' => 'defaultuser@example.com',
                'is_premium' => false,
                'password' => "default"
            ]
        ];

        foreach($users as $user) {
            User::factory()->create($user);
        }
    }
}
