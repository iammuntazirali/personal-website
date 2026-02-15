<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all profiles
        $profiles = Profile::all();

        if ($profiles->isEmpty()) {
            $this->command->info('No profiles found. Seed them first!');
            return;
        }

        // Cache profiles for fast lookup by display name
        $profileMap = $profiles->keyBy('display_name');

        // Determine JSON path based on environment
        $jsonPath = app()->environment('production')
            ? database_path('seeders/production/data/projects.json')
            : database_path('seeders/data/projects.json');

        // Seed projects from JSON if it exists
        if (File::exists($jsonPath)) {
            $projects = json_decode(File::get($jsonPath), true);

            if (!is_array($projects)) {
                $this->command->error("Invalid JSON format in $jsonPath");
            } else {
                foreach ($projects as $data) {
                    // Validate required fields
                    if (empty($data['profile']) || empty($data['title']) || empty($data['description'])) {
                        $this->command->warn("Skipping project: missing required fields (profile, title, description).");
                        continue;
                    }

                    // Find related profile
                    $profile = $profileMap[$data['profile']] ?? null;
                    if (!$profile) {
                        $this->command->warn("Profile not found: {$data['profile']}");
                        continue;
                    }

                    // Update or create project
                    Project::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'title' => $data['title'],
                        ],
                        [
                            'type'        => $data['type'] ?? null,
                            'description' => $data['description'] ?? null,
                            'highlights'  => $data['highlights'] ?? null,
                            'project_url' => $data['project_url'] ?? null,
                            'github_url'  => $data['github_url'] ?? null,
                            'status'      => $data['status'] ?? 'draft',
                        ]
                    );
                }
            }
        }

        // Extra demo projects for local environment
        if (app()->environment('local')) {
            foreach ($profiles as $profile) {
                Project::factory()->count(3)->create([
                    'profile_id' => $profile->id,
                ]);
            }
        }

        $this->command->info('Projects seeded successfully.');
    }
}
