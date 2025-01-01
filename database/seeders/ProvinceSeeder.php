<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Province::factory(5)->create();  // Creates 5 provinces
    }
}
