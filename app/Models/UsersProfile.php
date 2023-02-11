<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    protected $fillable = [
        'user_id',
        'reddit_url',
        'twitter_url',
        'about_me',
        'country',
        'city',
        'avatar_url',
    ];
}