<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
        ]);

        \App\Models\Setting::create([
            'ceo_name' => 'CEO Name',
            'trainer_name' => 'Trainer Name',
            'trainer_agency' => 'Trainer Agency',
            'place' => 'Place',
            'date' => '2024-02-05',
            'ceo_signature' => 'CEO Signature',
            'trainer_signature' => 'Trainer Signature',

        ]);
    }
}
