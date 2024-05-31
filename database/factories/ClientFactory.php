<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->randomElement(['Paledang', 'Kapol', 'Legok Kiara', 'Barujati']),
            'start_meter' => 0,
            'current_meter' => rand(10, 30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
