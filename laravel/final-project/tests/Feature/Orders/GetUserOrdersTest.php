<?php

namespace Tests\Feature\Orders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUserOrdersTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_user_orders()
    {
        $user = User::factory()->create();
        $orders = Order::factory()->count(3)->create([
            'orderer_id' => $user->id,
        ]);
        Order::factory()->count(3)->create();

        $res = $this->getJson(route('orders.user', ['user' => $user->id]));

        $res->assertOk();
        $res->assertJsonCount(3, 'data');
    }
}
