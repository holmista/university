<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierLocations extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'courier_id',
    ];

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
