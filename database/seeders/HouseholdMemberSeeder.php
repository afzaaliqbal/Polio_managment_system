<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HouseholdMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\HouseholdMember::factory(5)->create();

    }
}
