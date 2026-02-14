<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;
use App\Models\Profile;
use App\Models\Organization;
use App\Models\SpokenLanguage;
use Illuminate\Support\Facades\File;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all profiles, organizations, and spoken languages
        $profiles = Profile::all();
        $organizations = Organization::all();
        $languages = SpokenLanguage::all();

        if ($profiles->isEmpty() || $organizations->isEmpty()) {
            $this->command->info('No profiles or organizations found. Seed them first!');
            return;
        }

        // Cache models for fast lookup by name
        $profileMap = $profiles->keyBy('display_name');
        $organizationMap = $organizations->keyBy('name');
        $languageMap = $languages->keyBy('name');

        // Determine JSON path based on environment (Production uses gitignored JSON)
        $jsonPath = app()->environment('production')
            ? database_path('seeders/production/data/certificates.json')
            : database_path('seeders/data/certificates.json');

        // Seed certificates from JSON if it exists
        if (File::exists($jsonPath)) {
            $certificates = json_decode(File::get($jsonPath), true);

            if (!is_array($certificates)) {
                $this->command->error("Invalid JSON format in $jsonPath");
            } else {
                foreach ($certificates as $data) {
                    // Validate required fields
                    if (empty($data['name']) || empty($data['profile']) || empty($data['organization']) || empty($data['date_awarded'])) {
                        $this->command->warn("Skipping certificate: missing required fields (name, profile, organization, or date_awarded).");
                        continue;
                    }

                    // Find related models using cached maps
                    $profile = $profileMap[$data['profile']] ?? null;
                    $organization = $organizationMap[$data['organization']] ?? null;
                    $language = isset($data['language']) ? $languageMap[$data['language']] ?? null : null;

                    if (!$profile) {
                        $this->command->warn("Profile not found: {$data['profile']}");
                        continue;
                    }

                    if (!$organization) {
                        $this->command->warn("Organization not found: {$data['organization']}");
                        continue;
                    }

                    // Update or create certificate 
                    Certificate::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'organization_id' => $organization->id,
                            'name' => $data['name'],
                        ],
                        [
                            'spoken_language_id' => $language?->id,
                            'description' => $data['description'] ?? null,
                            'date_awarded' => $data['date_awarded'],
                            'expiration_date' => $data['expiration_date'] ?? null,
                            'credential_link' => $data['credential_link'] ?? null,
                            'image' => $data['image'] ?? null,
                        ]
                    );
                }
            }
        }

        // Extra demo certificates only for local environment
        if (app()->environment('local')) {
            foreach ($profiles as $profile) {
                Certificate::factory(3)->create([
                    'profile_id' => $profile->id,
                    'organization_id' => $organizations->random()->id,
                    'spoken_language_id' => $profile->spokenLanguages->isNotEmpty()
                        ? $profile->spokenLanguages->random()->id
                        : null,
                ]);
            }
        }

        $this->command->info('Certificates seeded successfully.');
    }
}
