<?php

namespace Tests\Feature\OrderItems;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateOrderItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_successfully_create_order_item()
    {
        $order = Order::factory()->create();
        $dish = Dish::factory()->create();
        $res = $this->postJson(route('order-items.store'), [
            'order_id' => $order->id,
            'dish_id' => $dish->id,
            'amount' => 1,
        ]);

        $res->assertCreated();
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'dish_id' => $dish->id,
            'amount' => 1,
        ]);
    }

    public function test_return_error_if_order_does_not_exist()
    {
        $dish = Dish::factory()->create();
        $res = $this->postJson(route('order-items.store'), [
            'order_id' => 1,
            'dish_id' => $dish->id,
            'amount' => 1,
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('order_id');
    }

    public function test_return_error_if_dish_does_not_exist()
    {
        $order = Order::factory()->create();
        $res = $this->postJson(route('order-items.store'), [
            'order_id' => $order->id,
            'dish_id' => 1,
            'amount' => 1,
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('dish_id');
    }
}
