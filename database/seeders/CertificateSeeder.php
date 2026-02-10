<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;
use App\Models\Profile;
use App\Models\Organization;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = Profile::all();
        $organizations = Organization::all();

        if ($profiles->isEmpty() || $organizations->isEmpty()) {
            $this->command->info('No profiles or organizations found. Seed them first!');
            return;
        }

        foreach ($profiles as $profile) {
            // Create 3 certificates per profile
            Certificate::factory(3)->create([
                'profile_id' => $profile->id,
                'organization_id' => $organizations->random()->id,
                'spoken_language_id' => $profile->spokenLanguages->isNotEmpty()
                    ? $profile->spokenLanguages->random()->id
                    : null,
            ]);
        }
    }
}
