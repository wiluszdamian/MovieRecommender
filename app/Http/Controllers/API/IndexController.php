<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $client = new Client();
        $apiKey = env('API_TMDB_KEY');
        
        $popularMoviesResponse = $client->get("https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}&language=pl");
        $popularMovies = json_decode($popularMoviesResponse->getBody(), true)['results'];
        $popularMovies = array_slice($popularMovies, 0, 5);

        $popularTvSeriesResponse = $client->get("https://api.themoviedb.org/3/tv/popular?api_key={$apiKey}&language=pl");
        $popularTvSeries = json_decode($popularTvSeriesResponse->getBody(), true)['results'];
        $popularTvSeries = array_slice($popularTvSeries, 0, 5);
               
        return view('index', [
            'popularMovies' => $popularMovies,
            'popularTvSeries' => $popularTvSeries
        ]);
    }

    /**
     * Summary of showMovie
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showMovie($id)
    {
        $client = new Client();
        $apiKey = env('API_TMDB_KEY');

        $movieResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}&language=pl");
        $movie = json_decode($movieResponse->getBody(), true);

        $recommendationsResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}/recommendations?api_key={$apiKey}&language=pl");
        $recommendations = json_decode($recommendationsResponse->getBody(), true)['results'];
        $recommendations = array_slice($recommendations, 0, 10);

        $actorResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}/credits?api_key={$apiKey}&language=pl");
        $actors = json_decode($actorResponse->getBody(), true)['cast'];
        $actors = array_slice($actors, 0, 10);

        return view('pages.showMovie', [
            'movie' => $movie,
            'actors' => $actors,
            'recommendations' => $recommendations
        ]);
    }
    
    /**
     * Summary of showTvSeries
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showTvSeries($id)
    {
        $client = new Client();
        $apiKey = env('API_TMDB_KEY');

        $tvSeriesResponse = $client->get("https://api.themoviedb.org/3/tv/{$id}?api_key={$apiKey}&language=pl");
        $tvSeries = json_decode($tvSeriesResponse->getBody(), true);

        $recommendationsResponse = $client->get("https://api.themoviedb.org/3/tv/{$id}/recommendations?api_key={$apiKey}&language=pl");
        $recommendations = json_decode($recommendationsResponse->getBody(), true)['results'];
        $recommendations = array_slice($recommendations, 0, 10);

        $actorResponse = $client->get("https://api.themoviedb.org/3/tv/{$id}/credits?api_key={$apiKey}&language=pl");
        $actors = json_decode($actorResponse->getBody(), true)['cast'];
        $actors = array_slice($actors, 0, 10);

        return view('pages.showTvSeries', [
            'tv_series' => $tvSeries,
            'actors' => $actors,
            'recommendations' => $recommendations
        ]);
    }

    /**
     * Summary of showActres
     *
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showActres($id)
    {
        $client = new Client();
        $apiKey = env('API_TMDB_KEY');

        $actresResponse = $client->get("https://api.themoviedb.org/3/person/{$id}?api_key={$apiKey}&language=pl");
        $actres = json_decode($actresResponse->getBody(), true);

        $actresMovieResponse = $client->get("https://api.themoviedb.org/3/person/{$id}/movie_credits?api_key={$apiKey}&language=pl");
        $actresMovie = json_decode($actresMovieResponse->getBody(), true)['cast'];
        $actresMovie = array_slice($actresMovie, 0, 10);

        $actresTvResponse = $client->get("https://api.themoviedb.org/3/person/{$id}/tv_credits?api_key={$apiKey}&language=pl");
        $actresTv = json_decode($actresTvResponse->getBody(), true)['cast'];
        $actresTv = array_slice($actresTv, 0, 10);

        return view('pages.showActres', [
            'actres' => $actres,
            'actresMovie' => $actresMovie,
            'actresTv' => $actresTv,
        ]);
    }
}
