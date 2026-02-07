<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;
use App\Models\Profile;
use App\Models\Issuer;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = Profile::all();
        $issuers = Issuer::all();

        if ($profiles->isEmpty() || $issuers->isEmpty()) {
            $this->command->info('No profiles or issuers found. Seed them first!');
            return;
        }

        foreach ($profiles as $profile) {
            // Create 3 certificates per profile
            Certificate::factory(3)->create([
                'profile_id' => $profile->id,
                'issuer_id' => $issuers->random()->id,
                'spoken_language_id' => $profile->spokenLanguages->isNotEmpty()
                    ? $profile->spokenLanguages->random()->id
                    : null,
            ]);
        }
    }
}
