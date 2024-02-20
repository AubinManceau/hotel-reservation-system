<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HotelsFactory extends Factory
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
            'location' => fake()->city(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
            'nb_rooms' => fake()->numberBetween(1, 100),
            'price' => fake()->numberBetween(50, 500),
        ];
    }
}
