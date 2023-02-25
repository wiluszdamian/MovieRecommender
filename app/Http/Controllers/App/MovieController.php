<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TmdbApiService;

class MovieController extends Controller
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
     * Display the details page for a movie.
     * @param int $id The ID of the movie to display details for.
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $movie = $this->tmdb->getMovieDetails($id);
        $credits = $this->tmdb->getMovieCredits($id, count: 15);
        $recommendations = $this->tmdb->getRecommendations('movie', $id, count: 15);
        return view('movies.details', [
            'movie' => $movie,
            'actors' => $credits,
            'recommendations' => $recommendations
        ]);
    }
}