<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Aubin',
            'email' => 'aubinmanceau0@gmail.com',
            'password' => Hash::make('Am12102004'),
        ]);

        \App\Models\Hotels::factory(10)->create();

        \App\Models\Reservations::factory(100)->create();
    }
}
