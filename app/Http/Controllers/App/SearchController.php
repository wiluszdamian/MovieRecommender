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
        $query = $request->input('query');
        $year = $request->input('year');
        $genre = $request->input('genre');
        $country = $request->input('country');
        $language = "pl";
        $category = $request->input('category');

        $movieGenres = $this->tmdbApiService->getMovieGenres();
        $countries = $this->tmdbApiService->getCountries($request->input('language'), $request->input('country'));

        if (empty($query) && !empty($category)) {
            switch ($category) {
                case 'movie':
                    $movies = $this->tmdbApiService->searchMovies(null, $year, $genre, $language);
                    return view('search.index', compact('movies', 'movieGenres', 'countries'));
                    break;
                case 'tv':
                    $tvSeries = $this->tmdbApiService->searchTVSeries(null, $year, $genre, $language);
                    return view('search.index', compact('tvSeries', 'movieGenres', 'countries'));
                    break;
                case 'person':
                    $actors = $this->tmdbApiService->searchActors(null, $country, $language);
                    return view('search.index', compact('actors', 'movieGenres', 'countries'));
                    break;
            }
        }

        $movies = $this->tmdbApiService->searchMovies($query, $year, $genre, $language);
        $tvSeries = $this->tmdbApiService->searchTVSeries($query, $year, $genre, $language);
        $actors = $this->tmdbApiService->searchActors($query, $country, $language);

        return view('search.index', compact('movies', 'tvSeries', 'actors', 'movieGenres', 'countries'));
    }
}