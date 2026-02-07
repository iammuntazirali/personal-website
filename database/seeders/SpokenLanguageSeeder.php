<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpokenLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = \App\Models\Profile::all();

        if ($profiles->isEmpty()) {
            $this->command->info('No profiles found. Skipping SpokenLanguage seeding.');
            return;
        }

        foreach ($profiles as $profile) {
            // Create 1-3 spoken languages for each profile
            \App\Models\SpokenLanguage::factory(rand(1, 3))->create([
                'profile_id' => $profile->id,
            ]);
        }
    }
}
