<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'             => $this->faker->word(),
            'description'      => $this->faker->sentence(),
            'is_olympic_sport' => $this->faker->boolean(),
            'origin_country'   => $this->faker->country(),
            'first_played_date'=> $this->faker->date(),
        ];
    }
}
