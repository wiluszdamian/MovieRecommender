<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'person_id',
    ];
}
