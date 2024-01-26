<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->make()->id,
            'feedbackable_id' => Dish::factory()->make()->id,
            'feedbackable_type' => Dish::class,
            'rating' => $this->faker->numberBetween(1, 5),
            'content' => $this->faker->sentence(10)
        ];
    }
}
