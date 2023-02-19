<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TmdbApiService;

class MovieController extends Controller
{
    public function __construct(TmdbApiService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    public function show($id)
    {
        $movie = $this->tmdb->getMovieDetails($id);
        $credits = $this->tmdb->getMovieCredits($id, count: 6);
        $recommendations = $this->tmdb->getRecommendations('movie', $id, count: 6);
        return view('movies.details', [
            'movie' => $movie,
            'actors' => $credits,
            'recommendations' => $recommendations
        ]);
    }
}
