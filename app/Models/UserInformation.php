<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'batch_id',
        'department_id',
        'mobile',
        'dob',
        'gender',
        'religion',
        'photo',
        'unique_id',
        'blood_group',
        'image',
    ];
    protected $table = 'user_informations';
    protected $dates = ['dob'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
