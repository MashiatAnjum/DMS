<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoomSeatAllocation extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'seat_id',
        'allocation_date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
