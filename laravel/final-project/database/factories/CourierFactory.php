<?php

namespace Database\Factories;

use App\Enums\VehicleTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courier>
 */
class CourierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_number' => $this->faker->unique()->randomNumber(9),
            'user_id' => User::factory()->create(['is_courier'=>true])->id,
            'vehicle_type' => VehicleTypeEnum::getRandomValue(),
        ];
    }
}
