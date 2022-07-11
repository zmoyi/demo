<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qtoken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
        'yes_time',
        'is_qr'
    ];
}
