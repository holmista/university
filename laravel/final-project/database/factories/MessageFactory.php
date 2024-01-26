<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'conversation_id' => Conversation::factory()->make()->id,
            'sender_id' => User::factory()->make()->id,
            'sender_type' => User::class,
            'receiver_id' => User::factory()->make(['is_courier'=>true])->id,
            'receiver_type' => User::class,
            'content' => $this->faker->sentence(10)
        ];
    }
}
