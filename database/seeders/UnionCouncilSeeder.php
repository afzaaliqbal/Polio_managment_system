<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnionCouncilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\UnionCouncil::factory(5)->create();
    }
}
