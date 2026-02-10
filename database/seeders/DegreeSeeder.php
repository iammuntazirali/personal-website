<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Degree;
use App\Models\Profile;
use App\Models\Organization;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = Profile::first(); // pick first profile
        $organizations = Organization::all();    // get all organizations

        Degree::factory(3)->create([
            'profile_id' => $profile->id,
            
            // pick a random organization for each degree
            'organization_id' => function () use ($organizations) {
                return $organizations->random()->id; 
            },
        ]);
    }
}
