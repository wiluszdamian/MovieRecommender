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
        $searchQuery = $this->getSearchQuery($request);
        $language = $request->input('language') ?: 'pl';
        $country = $request->input('country');
        $movieGenres = $this->tmdbApiService->getMovieGenres();
        $countries = $this->tmdbApiService->getCountries($language, $country);

        if (!empty($searchQuery['category'])) {
            switch ($searchQuery['category']) {
                case 'movie':
                    $movies = $this->tmdbApiService->searchMovies(null, $searchQuery['year'], $searchQuery['genre'], $searchQuery['language']);
                    return view('search.index', compact('movies', 'movieGenres', 'countries'));
                    break;
                case 'tv':
                    $tvSeries = $this->tmdbApiService->searchTVSeries(null, $searchQuery['year'], $searchQuery['genre'], $searchQuery['language']);
                    return view('search.index', compact('tvSeries', 'movieGenres', 'countries'));
                    break;
                case 'person':
                    $actors = $this->tmdbApiService->searchActors(null, $searchQuery['country'], $searchQuery['language']);
                    return view('search.index', compact('actors', 'movieGenres', 'countries'));
                    break;
            }
        }

        $movies = $this->tmdbApiService->searchMovies($searchQuery['query'], $searchQuery['year'], $searchQuery['genre'], $searchQuery['language']);
        $tvSeries = $this->tmdbApiService->searchTVSeries($searchQuery['query'], $searchQuery['year'], $searchQuery['genre'], $searchQuery['language']);
        $actors = $this->tmdbApiService->searchActors($searchQuery['query'], $searchQuery['country'], $searchQuery['language']);

        return view('search.index', compact('movies', 'tvSeries', 'actors', 'movieGenres', 'countries'));
    }

    private function getSearchQuery(Request $request): array
    {
        $query = $request->input('query');
        $year = $request->input('year');
        $genre = $request->input('genre');
        $country = $request->input('country');
        $language = "pl";
        $category = $request->input('category');

        return [
            'query' => $query,
            'year' => $year,
            'genre' => $genre,
            'country' => $country,
            'language' => $language,
            'category' => $category,
        ];
    }
}
