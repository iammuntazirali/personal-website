<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Profile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * The model this factory is for.
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id'  => Profile::inRandomOrder()->first()->id,
            'title'       => $this->faker->unique()->sentence(4),
            'type'        => $this->faker->optional()->randomElement([
                                'Self-Initiated Project', 
                                'Independent Project', 
                                'Thesis Project'
                             ]),
            'description' => $this->faker->paragraph(3),
            'highlights'  => $this->faker->optional()->paragraphs(3),
            'project_url' => $this->faker->optional()->url(),
            'github_url'  => $this->faker->optional()->url(),
            'status'      => $this->faker->randomElement(['draft', 'published'])
        ];
    }
}
