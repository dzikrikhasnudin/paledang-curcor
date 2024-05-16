<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(15)->create();

        User::factory()->create([
            'name' => 'Dzikri Khasnudin',
            'email' => 'dzikri.khasnudin2@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
