<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        if (!app()->environment('local')) {
            return;
        }

        Profile::factory()->count(5)->create();
    }
}
