<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\UserWatchlist;
use App\Http\Traits\MediaControllerTrait;

class WatchlistController extends Controller
{
    use MediaControllerTrait;

    public function addMovieToWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'movie_id', 'add');
    }

    public function addTvToWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'tv_id', 'add');
    }

    public function removeMovieFromWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'movie_id', 'remove');
    }

    public function removeTvFromWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'tv_id', 'remove');
    }
}
