<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\ProfileLink;

class ProfileLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only seed in local environment
        if (!app()->environment('local')) {
            return;
        }

        // Get some existing profiles or create new ones
        $profiles = Profile::all();
        if ($profiles->isEmpty()) {
            $profiles = Profile::factory()->count(5)->create();
        }

        // Seed 1–3 links per profile
        foreach ($profiles as $profile) {
            $linksCount = rand(1, 3);
            ProfileLink::factory()->count($linksCount)->create([
                'profile_id' => $profile->id,
            ]);
        }
    }
}
