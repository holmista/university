<?php

namespace Tests\Feature\Orders;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAllOrdersTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_orders()
    {
        $orders = Order::factory()->count(3)->create();

        $res = $this->getJson(route('orders.index'));

        $res->assertOk();
        $res->assertJsonCount(3, 'data');
    }
}
