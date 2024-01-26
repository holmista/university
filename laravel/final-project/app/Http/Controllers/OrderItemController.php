<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemRequest;
use App\Services\OrderItemService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    protected $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    public function store(StoreOrderItemRequest $request)
    {
        $data = $this->orderItemService->store($request->validated());
        return $this->successResponse($data, 201);
    }
}
