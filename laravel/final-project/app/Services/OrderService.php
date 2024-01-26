<?php

namespace App\Services;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderService extends BaseCrudService
{
    public function __construct()
    {
        parent::__construct(Order::class);
    }

    public function getUserOrders($user)
    {
        return $user->orders;
    }

    public function show(Order $order)
    {
        return $order->load('orderItems.dish.restaurant')->load('courier.user')->load('orderer');
    }
}
