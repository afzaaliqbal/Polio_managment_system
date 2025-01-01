<?php

namespace Database\Factories;

use App\Models\UnionCouncil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HouseholdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'household_name' => $this->faker->name(),
            'union_council_id' => UnionCouncil::factory(),
        ];
    }
}
