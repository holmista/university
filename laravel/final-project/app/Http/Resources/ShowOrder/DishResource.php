<?php

namespace App\Http\Resources\ShowOrder;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
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
            'name' => $this->name,
            'restaurant_id' => $this->restaurant_id,
            'price' => $this->price,
            'discount' => $this->discount,
            'restaurant' => RestaurantResource::make($this->restaurant),
        ];
    }
}
