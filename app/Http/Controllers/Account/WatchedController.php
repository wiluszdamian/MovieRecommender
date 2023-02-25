<?php

namespace App\Http\Controllers\Account;


use App\Http\Controllers\Controller;
use App\Models\UserWatched;
use App\Http\Traits\MediaControllerTrait;

class WatchedController extends Controller
{
    use MediaControllerTrait;

    /**
     * Add a movie to the user's watched list and redirect back with a message.
     * @param int $id The ID of the movie to add to the watched list.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addMovieToWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'movie_id', 'add');
    }

    /**
     * Add a TV show to the user's watched list and redirect back with a message.
     * @param int $id The ID of the TV show to add to the watched list.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addTvToWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'tv_id', 'add');
    }

    /**
     * Remove a movie from the user's watched list and redirect back with a message.
     * @param int $id The ID of the movie to remove from the watched list.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeMovieFromWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'movie_id', 'remove');
    }

    /**
     * Remove a TV show from the user's watched list and redirect back with a message.
     * @param int $id The ID of the TV show to remove from the watched list.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeTvFromWatched($id)
    {
        return $this->addMediaTo(UserWatched::class, $id, 'tv_id', 'remove');
    }
}