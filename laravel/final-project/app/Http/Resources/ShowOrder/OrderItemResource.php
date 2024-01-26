<?php

namespace App\Http\Resources\ShowOrder;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'order_id' => $this->order_id,
            'dish_id' => $this->dish_id,
            'amount' => $this->amount,
            'dish' => DishResource::make($this->dish),
        ];
    }
}
