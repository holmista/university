<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Courier extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_number',
        'user_id',
        'vehicle_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routeNotificationForMail()
    {
        return $this->user->email;
    }

    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver');
    }

    public function leftComplaints()
    {
        return $this->morphMany(Complaint::class, 'complainer');
    }

    public function receivedComplaints()
    {
        return $this->morphMany(Complaint::class, 'complainee');
    }

    public function feedbacks()
    {
        return $this->morphMany(Feedback::class, 'feedbackable');
    }
}
