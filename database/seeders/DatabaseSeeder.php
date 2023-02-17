<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();
        // \App\Models\Team::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'miksmth502@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '1'
        ]);
    }
}