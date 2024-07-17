<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Client::factory(50)->create();
        // Payment::factory(50)->create();
        // Transaction::factory(30)->create();

        User::factory()->create([
            'name' => 'Dzikri Khasnudin',
            'email' => 'dzikri.khasnudin2@gmail.com',
            'password' => Hash::make('Lulus2021.'),
        ]);

        User::factory()->create([
            'name' => 'Paledang Curcor Admin',
            'email' => 'admin@paledangcurcor.com',
            'password' => Hash::make('caicurcor123'),
        ]);
    }
}
