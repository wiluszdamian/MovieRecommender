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
        
        $popularMoviesResponse = $client->get("https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}&language=en-US&page=1");
        $popularMovies = json_decode($popularMoviesResponse->getBody(), true)['results'];
        $popularMovies = array_slice($popularMovies, 0, 5);

        $popularTvSeriesResponse = $client->get("https://api.themoviedb.org/3/tv/popular?api_key={$apiKey}&language=en-US&page=1");
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

        $movieResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}&language=en-US");
        $movie = json_decode($movieResponse->getBody(), true);

        $actorResponse = $client->get("https://api.themoviedb.org/3/movie/{$id}/credits?api_key={$apiKey}&language=en-US");
        $actors = json_decode($actorResponse->getBody(), true)['cast'];
        $actors = array_slice($actors, 0, 10);

        return view('pages.showMovie', [
            'movie' => $movie,
            'actors' => $actors,
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

        $tvSeriesResponse = $client->get("https://api.themoviedb.org/3/tv/{$id}?api_key={$apiKey}&language=en-US");
        $tvSeries = json_decode($tvSeriesResponse->getBody(), true);

        $actorResponse = $client->get("https://api.themoviedb.org/3/tv/{$id}/credits?api_key={$apiKey}&language=en-US");
        $actors = json_decode($actorResponse->getBody(), true)['cast'];
        $actors = array_slice($actors, 0, 10);

        return view('pages.showTvSeries', [
            'tv_series' => $tvSeries,
            'actors' => $actors,
        ]);
    }
}
