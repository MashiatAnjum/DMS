<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menue extends Model
{
    use HasFactory;
    protected $table = 'menues';
    protected $fillable = ['day', 'breakfast', 'lunch', 'snacks', 'dinner'];

}
