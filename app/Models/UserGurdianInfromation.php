<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGurdianInfromation extends Model
{
    use HasFactory;
    protected $table = 'user_gurdian_informations';

    protected $fillable = [
        'user_id',
        'fathers_name',
        'fathers_mobile',
        'mothers_name',
        'mothers_mobile',
        'local_gurdian_name',
        'local_gurdian_mobile',
        'local_gurdian_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
