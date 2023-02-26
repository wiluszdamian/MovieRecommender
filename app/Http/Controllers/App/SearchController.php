<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TmdbApiService;

class SearchController extends Controller
{
    protected $tmdbApiService;

    public function __construct(TmdbApiService $tmdbApiService)
    {
        $this->tmdbApiService = $tmdbApiService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query', ''); // domyślnie pusty ciąg
        $year = $request->input('year');
        $genre = $request->input('genre');
        $country = $request->input('country');
        $language = "pl";

        $movieGenres = $this->tmdbApiService->getMovieGenres();
        $countries = $this->tmdbApiService->getCountries($request->input('language'), $request->input('country'));

        $category = $request->input('category', 'movie'); // domyślnie "movie"
        switch ($category) {
            case 'movie':
                $movies = $this->tmdbApiService->searchMovies($query, $year, $genre, $language);
                $tvSeries = [];
                $actors = [];
                break;
            case 'tv':
                $movies = [];
                $tvSeries = $this->tmdbApiService->searchTVSeries($query, $year, $genre, $language);
                $actors = [];
                break;
            case 'person':
                $movies = [];
                $tvSeries = [];
                $actors = $this->tmdbApiService->searchActors($query, $country, $language);
                break;
            default:
                $movies = [];
                $tvSeries = [];
                $actors = [];
                break;
        }

        return view('search.index', compact('movies', 'tvSeries', 'actors', 'movieGenres', 'countries'));
    }
}