<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user feedback on each order
        $users = User::all();
        foreach ($users as $user) {
            $userOrders = $user->orders;
            foreach ($userOrders as $order) {
                $courier = $order->courier;
                // courier feedback
                Feedback::factory()->create(['user_id' => $user->id, 'feedbackable_id' => $courier->id, 'feedbackable_type' => User::class]);

                // dish feedback
                $orderItems = $order->orderItems;
                foreach ($orderItems as $orderItem) {
                    $dish = $orderItem->dish;
                    Feedback::factory()->create(['user_id' => $user->id, 'feedbackable_id' => $dish->id, 'feedbackable_type' => Dish::class]);
                }
            }
        }
    }
}
