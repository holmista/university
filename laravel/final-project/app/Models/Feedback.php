<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable =
    [
        'user_id',
        'feedbackable_id',
        'feedbackable_type',
        'rating',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function feedbackable()
    {
        return $this->morphTo();
    }
}
