<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Division::factory(5)->create();
    }
}
