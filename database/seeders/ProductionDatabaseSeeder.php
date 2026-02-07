<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Production\ProductionProfileSeeder;
use Database\Seeders\Production\ProductionCertificateSeeder;
use Database\Seeders\Production\ProductionDegreeSeeder;
use Database\Seeders\Production\ProductionProfileLinkSeeder;
use Database\Seeders\Production\ProductionProjectSeeder;
use Database\Seeders\Production\ProductionSpokenLanguageSeeder;


class ProductionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            IssuerSeeder::class,
            ProductionProfileSeeder::class,
            ProductionCertificateSeeder::class,
            ProductionDegreeSeeder::class,
            ProductionProfileLinkSeeder::class,
            ProductionProjectSeeder::class,
            ProductionSpokenLanguageSeeder::class
        ]);
    }
}
