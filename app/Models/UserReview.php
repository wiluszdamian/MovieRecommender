<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'movie_id',
        'tv_id',
        'stars_review',
        'review',
    ];
}
