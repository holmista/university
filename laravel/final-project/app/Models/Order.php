<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'orderer_id',
        'courier_id',
        'status',
    ];

    public function orderer()
    {
        return $this->belongsTo(User::class, 'orderer_id', 'id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
