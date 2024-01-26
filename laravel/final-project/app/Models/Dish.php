<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'restaurant_id',
        'discount',
        'rating',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function feedbacks()
    {
        return $this->morphMany(Feedback::class, 'feedbackable');
    }
}
