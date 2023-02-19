<?php

namespace App\Http\Controllers;


use App\Models\Movie;
use App\Services\TmdbApiService;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function __construct(TmdbApiService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    public function index()
    {
        $popularMovies = $this->tmdb->getTrendingMovies(count: 5);
        $popularTvSeries = $this->tmdb->getTrendingTvSeries(count: 5);
        $trendingPersons = $this->tmdb->getTrendingPersons(count: 5);

        return view('home.index', [
            'popularMovies' => $popularMovies,
            'popularTvSeries' => $popularTvSeries,
            'trendingPersons' => $trendingPersons
        ]);
    }
}
