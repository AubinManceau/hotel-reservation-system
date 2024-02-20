<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservations>
 */
class ReservationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_lastname' => fake()->lastName(),
            'client_firstname' => fake()->firstName(),
            'client_email' => fake()->email(),
            'client_phone' => fake()->phoneNumber(),
            'hotel_id' => fake()->numberBetween(1, 10),
            'room_id' => fake()->numberBetween(1, 100),
            'date_start' => fake()->dateTime(),
            'date_end' => fake()->dateTime(),
        ];
    }
}
