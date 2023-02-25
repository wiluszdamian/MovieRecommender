<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Create a new instance of the controller.
     * @param \App\Services\TmdbApiService $tmdb The TMDb API service to use.
     * @return void
     */
    public function __construct(TmdbApiService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    /**
     * Display the details page for an actor.
     * @param int $id The ID of the actor to display details for.
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $actors = $this->tmdb->getPersonDetails($id);
        $movieCredits = $this->tmdb->getActorMovieCredits($id, count: 15);
        $tvCredits = $this->tmdb->getActorTvCredits($id, count: 15);
        return view('actors.details', [
            'actres' => $actors,
            'actresMovie' => $movieCredits,
            'actresTv' => $tvCredits
        ]);
    }
}