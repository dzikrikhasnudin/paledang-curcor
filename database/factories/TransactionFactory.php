<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date('Y-m-d'),
            'description' => fake()->sentence(5),
            'category' => fake()->randomElement(['Pendapatan', 'Pengeluaran']),
            'amount' => rand(10000, 200000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
