<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'open_time',
        'close_time',
    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function receivedComplaints()
    {
        return $this->morphMany(Complaint::class, 'complainee');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
