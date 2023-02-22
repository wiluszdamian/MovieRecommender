<?php

namespace App\Http\Controllers\Account;


use App\Http\Controllers\Controller;
use App\Models\UserWatched;
use App\Http\Traits\MediaControllerTrait;

class WatchedController extends Controller
{
    use MediaControllerTrait;

    public function addMovieToWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'movie_id', 'add');
    }

    public function addTvToWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'tv_id', 'add');
    }

    public function removeMovieFromWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'movie_id', 'remove');
    }

    public function removeTvFromWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'tv_id', 'remove');
    }
}



