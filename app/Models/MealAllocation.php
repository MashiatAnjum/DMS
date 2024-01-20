<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealAllocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'assign_date', 'meal_id', 'user_id'
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
