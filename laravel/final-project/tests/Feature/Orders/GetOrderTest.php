<?php

namespace Tests\Feature\Orders;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_successfully_get_order()
    {
        $order = \App\Models\Order::factory()->create();
        $res = $this->getJson(route('orders.show', $order->id));

        $res->assertOk();
        $res->assertJsonStructure([
            'data' => [
                'id',
                'orderer_id',
                'courier_id',
                'status',
                'created_at',
                'order_items' => [
                    '*' => [
                        'id',
                        'order_id',
                        'dish_id',
                        'amount',
                        'dish' => [
                            'id',
                            'name',
                            'price',
                            'restaurant_id',
                            'discount',
                            'restaurant' => [
                                'id',
                                'name',
                                'rating'
                            ],
                        ],
                    ],
                ],
                'courier' => [
                    'id',
                    'name',
                    'email',
                ],
                'orderer' => [
                    'id',
                    'name',
                    'email',
                ],
            ],
        ]);
    }

    public function test_return_error_if_order_does_not_exist()
    {
        $res = $this->getJson(route('orders.show', -1));

        $res->assertStatus(404);
    }
}
