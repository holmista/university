<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Courier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'orderer_id' => User::factory()->create()->id,
            'courier_id' => Courier::factory()->create()->id,
            'status' => OrderStatusEnum::getRandomValue(),
        ];
    }
}