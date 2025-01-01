<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            ProvinceSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            TehsilSeeder::class,
            UnionCouncilSeeder::class,
            HouseholdSeeder::class,
            HouseholdMemberSeeder::class,
            UserRoleSeeder::class,
        ]);
    }
}
