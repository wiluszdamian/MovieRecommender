<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWatched extends Model
{
    protected $fillable = [
        'id',
        'movie_id',
        'movie_genres',
        'viewed',
    ];
}