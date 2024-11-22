<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
            'name' => 'Staff',
            'role' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Kepala',
            'role' => 'kepala',
            'email' => 'kepala@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
