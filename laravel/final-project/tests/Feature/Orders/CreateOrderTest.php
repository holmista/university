<?php

namespace Tests\Feature\Orders;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_successfully_create_order()
    {
        $user = User::factory()->create();
        $res = $this->postJson(route('orders.store'), [
            'orderer_id' => $user->id,
        ]);

        $res->assertCreated();
        $this->assertDatabaseHas('orders', [
            'orderer_id' => $user->id,
            'status' => 'pending',
        ]);
    }

    public function test_return_error_if_orderer_id_is_not_provided()
    {
        $res = $this->postJson(route('orders.store'), [
            'orderer_id' => null,
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('orderer_id');
    }

    public function test_return_error_if_orderer_id_is_provided_but_does_not_exist()
    {
        $res = $this->postJson(route('orders.store'), [
            'orderer_id' => -1,
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('orderer_id');
    }
}
