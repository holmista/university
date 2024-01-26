<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'complainer_id',
        'complainer_type',
        'complainee_id',
        'complainee_type',
        'content',
    ];

    public function complainer()
    {
        return $this->morphTo();
    }

    public function complainee()
    {
        return $this->morphTo();
    }
}
