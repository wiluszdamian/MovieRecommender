<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\UserWatchlist;
use App\Http\Traits\MediaControllerTrait;

class WatchlistController extends Controller
{
    use MediaControllerTrait;

    /**
     * Add a movie to the user's watchlist and redirect back with a message.
     * @param int $id The ID of the movie to add to the watchlist.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addMovieToWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'movie_id', 'add');
    }

    /**
     * Add a TV show to the user's watchlist and redirect back with a message.
     * @param int $id The ID of the TV show to add to the watchlist.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addTvToWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'tv_id', 'add');
    }

    /**
     * Remove a movie from the user's watchlist and redirect back with a message.
     * @param int $id The ID of the movie to remove from the watchlist.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeMovieFromWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'movie_id', 'remove');
    }

    /**
     * Remove a TV show from the user's watchlist and redirect back with a message.
     * @param int $id The ID of the TV show to remove from the watchlist.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeTvFromWatchlist($id)
    {
        return $this->addMediaTo(UserWatchlist::class, $id, 'tv_id', 'remove');
    }
}