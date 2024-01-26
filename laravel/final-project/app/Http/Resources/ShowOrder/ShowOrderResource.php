<?php

namespace App\Http\Resources\ShowOrder;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'orderer_id' => $this->orderer_id,
            'courier_id' => $this->courier_id,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'order_items' => OrderItemResource::collection($this->orderItems),
            'orderer' => OrdererResource::make($this->orderer),
            'courier' => CourierResource::make($this->courier),
        ];
    }
}
