<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'email' => 'nafishasnat.nh@gmail.com',
        ]);
        User::factory(10)->has(Profile::factory()->count(1))->create();
    }
}
