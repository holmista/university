<?php

namespace Database\Factories;

use App\Models\Courier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'complainer_id' => User::factory()->create()->id,
            'complainer_type' => User::class,
            'complainee_id' => Courier::factory()->create()->id,
            'complainee_type' => Courier::class,
            'content' => $this->faker->sentence(10)
        ];
    }
}
