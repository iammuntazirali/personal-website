<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;
use App\Models\ProfileLink;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileLink>
 */
class ProfileLinkFactory extends Factory
{
    protected $model = ProfileLink::class;
    public function definition(): array
    {
        $platforms = [
            'codepen',
            'freecodecamp',
            'github',
            'hackthebox',
            'leetcode',
            'linkedin',
            'website',
            'other',
        ];

        $platform = $this->faker->randomElement($platforms);

        $profileId = Profile::factory();

        $url = match($platform) {
            'github' => 'https://github.com/' . $this->faker->userName(),
            'linkedin' => 'https://linkedin.com/in/' . $this->faker->userName(),
            'codepen' => 'https://codepen.io/' . $this->faker->userName(),
            'freecodecamp' => 'https://www.freecodecamp.org/' . $this->faker->userName(),
            'hackthebox' => 'https://www.hackthebox.com/' . $this->faker->userName(),
            'leetcode' => 'https://leetcode.com/' . $this->faker->userName(),
            'website', 'other' => $this->faker->url,
        };

        return [
            'profile_id' => $profileId,
            'platform' => $platform,
            'url' => $url,
        ];
    }
}
