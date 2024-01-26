<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'conversation_id',
        'sender_id',
        'sender_type',
        'receiver_id',
        'receiver_type',
        'content',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function sender(): MorphTo
    {
        return $this->morphTo();
    }

    public function receiver(): MorphTo
    {
        return $this->morphTo();
    }
}
