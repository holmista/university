<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ShowOrder\ShowOrderResource;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getUserOrders(User $user)
    {
        $data = $this->orderService->getUserOrders($user);
        return $this->successResponse($data);
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $this->orderService->store($request->validated());
        return $this->successResponse($data, 201);
    }

    public function getOrderItems(Order $order)
    {
        $orderItems = $order->orderItems;
        return $this->successResponse($orderItems);
    }

    public function show(Order $order)
    {
        $data = $this->orderService->show($order);
        return $this->successResponse(ShowOrderResource::make($data));
    }

    public function index()
    {
        $builder = Order::query();
        if(request()->has('min_total'))
        {
            $minAmount = request()->min_total;

            $orderTotals = DB::table('order_items')
                            ->join('dishes', 'order_items.dish_id', '=', 'dishes.id')
                            ->selectRaw('order_items.order_id, SUM(dishes.price * order_items.amount) as total_amount')
                            ->groupBy('order_items.order_id');

            $builder->joinSub($orderTotals, 'order_totals', function ($join) {
                $join->on('orders.id', '=', 'order_totals.order_id');
            })->having('total_amount', '>=', $minAmount);
        }
        $data = $builder->get();
        return $this->successResponse($data);
    }
}
