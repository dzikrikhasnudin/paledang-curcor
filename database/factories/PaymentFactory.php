<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $month = fake()->randomElement(['Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);

        return [
            'client_id' => rand(1, 20),
            'month' => $month,
            'total_meter' => rand(1, 20),
            'amount' => rand(2000, 50000),
            'status' => fake()->randomElement(['paid', 'unpaid']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
