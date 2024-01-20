<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = [
        'meal_type',
        'start_time',
        'end_time',
    ];
    protected $table = 'meals';
    public function mealAllocations()
    {
        return $this->belongsToMany(MealAllocation::class);
    }
    
    

}
