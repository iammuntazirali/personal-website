<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //In alphabetical order
        $organizations = json_decode(file_get_contents(database_path('seeders/data/organizations.json')), true);

        foreach ($organizations as $organization) {
            DB::table('organizations')->updateOrInsert(
                ['name' => $organization['name']],
                [
                    'type' => $organization['type'],
                    'website' => $organization['website'],
                    'contact_email' => $organization['contact_email'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
