<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Import model User

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = [
            [
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'name' => 'Admin',
                'password' => bcrypt('123')
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
