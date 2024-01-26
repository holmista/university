<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory()->make()->id,
            'dish_id' => Dish::factory()->make()->id,
            'amount' => $this->faker->numberBetween(1, 5)
        ];
    }
}
