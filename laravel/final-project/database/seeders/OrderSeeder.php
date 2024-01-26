<?php

namespace Database\Seeders;

use App\Models\Courier;
use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create order for each user
        $users = User::whereNot('is_courier', true)->get();
        foreach ($users as $user) {
            $order = Order::factory()->create(['orderer_id' => $user->id, 'courier_id' => Courier::inRandomOrder()->first()->id]);
            OrderItem::factory()->count(5)->create(['order_id' => $order->id, 'dish_id' => Dish::all()->random()->id]);
        }
    }
}
