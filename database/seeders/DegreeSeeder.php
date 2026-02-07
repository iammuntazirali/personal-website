<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Degree;
use App\Models\Profile;
use App\Models\Issuer;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = Profile::first(); // pick first profile
        $issuers = Issuer::all();    // get all issuers

        Degree::factory(3)->create([
            'profile_id' => $profile->id,
            
            // pick a random issuer for each degree
            'issuer_id' => function () use ($issuers) {
                return $issuers->random()->id; 
            },
        ]);
    }
}
