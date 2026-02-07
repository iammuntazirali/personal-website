<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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

        $user = User::first(); // the user created in DatabaseSeeder

        Profile::factory()->count(2)->create([
            'user_id' => $user->id, // explicitly link to the main user
        ]);
    }
}
