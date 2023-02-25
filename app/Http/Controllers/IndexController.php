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
        $popularMovies = $this->tmdb->getTrendingMovies(count: 15);
        $popularTvSeries = $this->tmdb->getTrendingTvSeries(count: 15);
        $trendingPersons = $this->tmdb->getTrendingPersons(count: 15);

        return view('home.index', [
            'popularMovies' => $popularMovies,
            'popularTvSeries' => $popularTvSeries,
            'trendingPersons' => $trendingPersons
        ]);
    }
}