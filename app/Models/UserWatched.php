<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWatched extends Model
{
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'movie_id',
        'tv_id',
    ];
}
