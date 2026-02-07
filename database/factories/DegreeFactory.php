<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Degree;
use App\Models\Profile;
use App\Models\Issuer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Degree>
 */
class DegreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
            'issuer_id' => Issuer::factory(),

            // Degree details
            'title' => $this->faker->sentence(3),
            'level' => $this->faker->randomElement(['Bachelor', 'Master', 'PhD']), // required
            'field' => $this->faker->optional()->word(), 

            // Dates
            'start_date' => $this->faker->optional()->date('Y-m-d', '2020-01-01'),
            'end_date' => $this->faker->optional()->date('Y-m-d', '2024-12-31'),

            // Grade and image
            'grade' => $this->faker->optional()->randomElement(['A+', 'A', 'B+', 'B', '3.8', '4.0']),
            'image' => null
        ];
    }
}
