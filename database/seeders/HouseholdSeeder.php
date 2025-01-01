<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Household::factory(5)->create();
    }
}
