<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'present_address',
        'permanent_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
