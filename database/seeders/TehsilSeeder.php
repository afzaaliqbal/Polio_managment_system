<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TehsilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tehsil::factory(5)->create();
    }
}
