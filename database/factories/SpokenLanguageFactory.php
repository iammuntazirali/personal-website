<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpokenLanguage>
 */
class SpokenLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => \App\Models\Profile::factory(),
            'name' => $this->faker->languageCode(), // Using languageCode as a proxy for language name since 'language' might not be available in all faker providers, adjusting if needed. Actually, faker->languageName() is better if available but often languageCode or just a random word is used. Let's use a random element from a list for better realism or just a word.
            // Better approach for 'name':
            'name' => $this->faker->randomElement(['English', 'Spanish', 'French', 'German', 'Chinese', 'Japanese', 'Russian', 'Portuguese', 'Arabic', 'Hindi']),
            'proficiency' => $this->faker->randomElement(['Native', 'Fluent', 'Professional', 'Intermediate', 'Beginner']),
            'is_native' => $this->faker->boolean(20), // 20% chance of being native
        ];
    }
}
